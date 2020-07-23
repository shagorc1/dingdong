<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

use App\Classes\DataResponse;
use App\Models\Plans;
use App\Models\Municipalities;
use App\Users;

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
    public function create()
    {
        $clients = [];
        $municipalities = Municipalities::where('active', 1)->get();
        $plans = Plans::where('active', 1)->get();

        return view('clients.form', compact(['plans', 'clients', 'municipalities']));
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
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'El campo "Nombre" es requerido',
            'name.max' => 'El campo "Nombre" es maximo 100 caracteres',
            'lastname.required' => 'El campo "Apellidos" es requerido',
            'lastname.max' => 'El campo "Apellidos" es maximo 100 caracteres',
            'email.required' => 'El campo "E-amil" es requerido',
            'email.email' => 'El campo "E-mail" tiene un correo invalido',
            'email.unique' => 'Ya existe ese "E-mail" en los registros'

        ]);
        $user = Users::create($validatedData);

        return redirect()->route('business-edit', $busi->id)->with('success', 'Negocio creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
