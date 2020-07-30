<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

use App\Classes\DataResponse;
use App\Models\Companies;
use App\Models\Municipalities;
use App\Models\Categories;
use App\User;
use App\Services\CompaniesService;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $busines = [];
        $user = [];
        $categories = Categories::where('active', 1)->get();
        $municipalities = Municipalities::where('active', 1)->get();

        return view('business.form', compact(['busines', 'user', 'categories', 'municipalities', 'request']));
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
            'description' => 'required',
            'address' => 'required|max:200',
            'geolocation' => 'required',
            'username' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed|max:15',
            'phone' => 'required|max:20',
            'municipality_id' => 'required',
            'category_id' => 'required'
        ], [
            'name.required' => 'El campo "Nombre" es requerido',
            'name.max' => 'El campo "Nombre" es maximo 100 caracteres',
            'description.required' => 'El campo "Descripcion" es requerido',
            'address.required' => 'El campo "Direccion" es requerido',
            'address.max' => 'El campo "Direccion" debe tener maximo 200 caracteres',
            'geolocation.required' => 'El campo "Geolocalizacion" es requerido',
            'username.required' => 'El campo "Nombre Usuario" es requerido',
            'username.max' => 'El campo "Nombre Usuario" es maximo 100 caracteres',
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
            'phone.max' => 'El campo "Telefono" debe de tener maximo 20 caracteres'
        ]);

        $user_data = [ 
            'name' => $validatedData['username'], 
            'last_name' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => 2
        ];

        $user = User::create($user_data);
        $validatedData['user_id'] = $user->id;
        unset($validatedData['username']);
        unset($validatedData['lastname']);
        unset($validatedData['email']);
        unset($validatedData['phone']);
        unset($validatedData['password']);
        unset($validatedData['password2']);

        $business = Companies::create($validatedData);
        
        return redirect()->route('business-edit', $business->id)->with('success', 'Negocio creado');
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
        
        $company = CompaniesService::paginate($search);
        $totalCount = (int)$company->count();
        $dataResponse = new DataResponse();             
        $dataResponse->data = $company->offset($start)->limit($numberPerPage)->get();
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
        $busines = Companies::find($id);
        $categories = Categories::where('active', 1)->get();
        $municipalities = Municipalities::where('active', 1)->get();
        if (!empty($busines)) {
            $user_data = User::find($busines->user_id);
            $user = [
                'username' => $user_data->name,
                'lastname' => $user_data->last_name,
                'email' => $user_data->email,
                'phone' => $user_data->telephone
            ];
            return view('business.form', compact(['busines', 'user', 'categories', 'municipalities', 'request']));
        } else {
            return redirect()->route('business-index');
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
        $user_id = $request->get('user_id');
        $password = (!empty($request->get('password'))) ? 'sometimes|min:8|confirmed|max:15' : '';
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'address' => 'required|max:200',
            'geolocation' => 'required',
            'username' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|unique:users,email,'  . $user_id,
            'password' => $password,
            'phone' => 'required|max:20',
            'municipality_id' => 'required',
            'category_id' => 'required'
        ], [
            'name.required' => 'El campo "Nombre" es requerido',
            'name.max' => 'El campo "Nombre" es maximo 100 caracteres',
            'description.required' => 'El campo "Descripcion" es requerido',
            'address.required' => 'El campo "Direccion" es requerido',
            'address.max' => 'El campo "Direccion" debe tener maximo 200 caracteres',
            'geolocation.required' => 'El campo "Geolocalizacion" es requerido',
            'username.required' => 'El campo "Nombre Usuario" es requerido',
            'username.max' => 'El campo "Nombre Usuario" es maximo 100 caracteres',
            'lastname.required' => 'El campo "Apellidos" es requerido',
            'lastname.max' => 'El campo "Apellidos" es maximo 100 caracteres',
            'email.email' => 'El campo "E-mail" tiene un correo invalido',
            'email.unique' => 'Ya existe ese "E-mail" en los registros',
            'password.min' => 'La contraseña debe de tener minimo 8 caracteres',
            'password.max' => 'La contraseña debe de tener maximo 20 caracteres',
            'password.confirmed' => 'La contraseña no coincide con "Repite-Contraseña"',
            'phone.required' => 'El campo "Telefono" es requerido',
            'phone.max' => 'El campo "Telefono" debe de tener maximo 20 caracteres'
        ]);

        $user_data = [ 
            'name' => $validatedData['username'], 
            'last_name' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['phone']
        ];

        if($password !== '') {
            $user_data['password'] =  Hash::make($validatedData['password']);
        }

        $user = User::whereId($user_id)->update($user_data);
        unset($validatedData['id']);
        unset($validatedData['username']);
        unset($validatedData['lastname']);
        unset($validatedData['email']);
        unset($validatedData['phone']);
        unset($validatedData['password']);
        unset($validatedData['password2']);

        Companies::whereId($id)->update($validatedData);

        return redirect()->route('business-edit', $id)->with('success', 'Negocio actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $busi = Companies::find($id);
        $name = $busi->name;
        $busi->active = 0;
        $busi->save();

        return redirect()->route('business-index')->with('success', 'Negocio "' . $name . '" eliminado');
    }
}
