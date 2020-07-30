<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

use App\Classes\DataResponse;
use App\Models\Plans;
use App\Models\Municipalities;
use App\Models\States;
use App\Models\UsersPlans;
use App\Models\Addresses;
use App\User;
use App\Services\ClientsService;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clients = [];
        $municipalities = Municipalities::where('active', 1)->get();
        $states = States::where('active', 1)->get();
        $plans = Plans::where('active', 1)->get();

        return view('clients.form', compact(['plans', 'clients', 'municipalities', 'states', 'request']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed|max:15',
            'phone' => 'required|max:20',
            'street' => 'required|max:200',
            'number' => 'required|max:20',
            'colony' => 'required|max:200',
            'cp' => 'required|max:5',
            'geolocation' => 'required',
            'municipality_id' => 'required',
            'plan_id' => 'required',
            'state_id' => 'required',
        ], [
            'name.required' => 'El campo "Nombre Usuario" es requerido',
            'name.max' => 'El campo "Nombre Usuario" es maximo 100 caracteres',
            'lastname.required' => 'El campo "Apellidos" es requerido',
            'lastname.max' => 'El campo "Apellidos" es maximo 100 caracteres',
            'email.required' => 'El campo "E-amil" es requerido',
            'email.email' => 'El campo "E-mail" tiene un correo invalido',
            'email.unique' => 'Ya existe ese "E-mail" en los registros',
            'password.min' => 'La contraseña debe de tener minimo 8 caracteres',
            'password.max' => 'La contraseña debe de tener maximo 20 caracteres',
            'password.confirmed' => 'La contraseña no coincide con "Repite-Contraseña"',
            'password.required' => 'El campo "Contraseña" es requerida',
            'phone.required' => 'El campo "Telefono" es requerido',
            'phone.max' => 'El campo "Telefono" debe de tener maximo 20 caracteres',
            'street.required' => 'El campo "Calle" es requerido',
            'street.max' => 'El campo "Calle" debe de tener maximo 200 caracteres',
            'number.required' => 'El campo "Numero" es requerido',
            'number.max' => 'El campo "Numero" debe de tener maximo 20 caracteres',
            'colony.required' => 'El campo "Colonia" es requerido',
            'colony.max' => 'El campo "Colonia" debe de tener maximo 200 caracteres',
            'cp.required' => 'El campo "Codigo Postal" es requerido',
            'cp.max' => 'El campo "Codigo Postal" debe de tener maximo 5 caracteres',
            'geolocation.required' => 'El campo "Geolocalizacion" es requerido'
        ]);
        
        $user_data = [ 
            'name' => $validatedData['name'], 
            'last_name' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => 3
        ];

    
        $user = User::create($user_data);

        $plan_data = [
            'plan_id' => $validatedData['plan_id'],
            'user_id' => $user->id,
            'date_hire' => date('Y-m-d H:i:s')
        ];

        UsersPlans::create($plan_data);

        $address_data = [
            'user_id' => $user->id,
            'street' => $validatedData['street'], 
            'number' => $validatedData['number'],
            'colony' => $validatedData['colony'],
            'cp' => $validatedData['cp'],
            'geolocation' => $validatedData['geolocation'],
            'state_id' => $validatedData['state_id'],
            'municipality_id' => $validatedData['municipality_id']
        ];

        Addresses::create($address_data);


        return redirect()->route('clients-edit', $user->id)->with('success', 'Cliente creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paginate(Request $request)
    {
        $currentPage = (int)$request->input('currentPage');
        $numberPerPage = (int)$request->input('length');
        $draw = (int)$request->input('draw');
        $start = (int)$request->input('start');
        $search = $request->input('search')['value'];
        $client = ClientsService::paginate($search);
        $totalCount = (int)$client->count();
        $dataResponse = new DataResponse();             
        $dataResponse->data = $client->offset($start)->limit($numberPerPage)->get();
        $dataResponse->recordsTotal = $totalCount;
        $dataResponse->draw = $draw;
        $dataResponse->recordsFiltered = $totalCount;

        return response()->json($dataResponse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, request $request)
    {
        $clients = User::find($id);
        if ($clients && $clients->role_id == 3) {
            $municipalities = Municipalities::where('active', 1)->get();
            $states = States::where('active', 1)->get();
            $plans = Plans::where('active', 1)->get();
    
            return view('clients.form', compact(['plans', 'clients', 'municipalities', 'states', 'request']));
        } else {
            return redirect()->route('clients-index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $password = (!empty($request->get('password'))) ? 'sometimes|min:8|confirmed|max:15' : '';

        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|unique:users,email,' . $id,
            'password' => $password ,
            'phone' => 'required|max:20',
            'street' => 'required|max:200',
            'number' => 'required|max:20',
            'colony' => 'required|max:200',
            'cp' => 'required|max:5',
            'geolocation' => 'required',
            'municipality_id' => 'required',
            'plan_id' => 'required',
            'state_id' => 'required',
        ], [
            'name.required' => 'El campo "Nombre Usuario" es requerido',
            'name.max' => 'El campo "Nombre Usuario" es maximo 100 caracteres',
            'lastname.required' => 'El campo "Apellidos" es requerido',
            'lastname.max' => 'El campo "Apellidos" es maximo 100 caracteres',
            'email.required' => 'El campo "E-amil" es requerido',
            'email.email' => 'El campo "E-mail" tiene un correo invalido',
            'email.unique' => 'Ya existe ese "E-mail" en los registros',
            'password.min' => 'La contraseña debe de tener minimo 8 caracteres',
            'password.max' => 'La contraseña debe de tener maximo 20 caracteres',
            'password.confirmed' => 'La contraseña no coincide con "Repite-Contraseña"',
            'phone.required' => 'El campo "Telefono" es requerido',
            'phone.max' => 'El campo "Telefono" debe de tener maximo 20 caracteres',
            'street.required' => 'El campo "Calle" es requerido',
            'street.max' => 'El campo "Calle" debe de tener maximo 200 caracteres',
            'number.required' => 'El campo "Numero" es requerido',
            'number.max' => 'El campo "Numero" debe de tener maximo 20 caracteres',
            'colony.required' => 'El campo "Colonia" es requerido',
            'colony.max' => 'El campo "Colonia" debe de tener maximo 200 caracteres',
            'cp.required' => 'El campo "Codigo Postal" es requerido',
            'cp.max' => 'El campo "Codigo Postal" debe de tener maximo 5 caracteres',
            'geolocation.required' => 'El campo "Geolocalizacion" es requerido'
        ]);


        $user_data = [ 
            'name' => $validatedData['name'], 
            'last_name' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['phone']
        ];

        if($password !== '') {
            $user_data['password'] =  Hash::make($validatedData['password']);
        }

        User::whereId($id)->update($user_data);
        $user = User::find($id);
        if ($user->plan->id !== $validatedData['plan_id']) {
            $plan_data = [
                'plan_id' => $validatedData['plan_id'],
                'date_hire' => date('Y-m-d H:i:s')
            ];
    
            UsersPlans::whereUserId($id)->update($plan_data);
        }


        $address_data = [
            'street' => $validatedData['street'], 
            'number' => $validatedData['number'],
            'colony' => $validatedData['colony'],
            'cp' => $validatedData['cp'],
            'geolocation' => $validatedData['geolocation'],
            'state_id' => $validatedData['state_id'],
            'municipality_id' => $validatedData['municipality_id']
        ];

        Addresses::whereUserId($id)->update($address_data);

        return redirect()->route('clients-edit', $id)->with('success', 'Cliente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = User::find($id);
        $name = $client->name . ' ' . $client->last_name;
        $client->active = 0;
        $client->save();

        return redirect()->route('clients-index')->with('success', 'Cliente "' . $name . '" eliminado');
    }
}
