<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

use App\Classes\DataResponse;
use App\Models\Companies;
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
    public function create()
    {
        $busines = [];
        return view('business.form', compact('busines'));
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
            'type' => 'required'
        ], [
            'name.required' => 'El campo "Nombre" es requerido',
            'name.max' => 'El campo "Nombre" es maximo 100 caracteres'
        ]);
        $busi = Companies::create($validatedData);

        return redirect()->route('business-edit', $busi->id)->with('success', 'Negocio creado');
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
    public function edit($id)
    {
        $busines = Companies::find($id);
        if (!empty($business)) {
            return view('business.form', compact('busines'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:100'
        ], [
            'name.required' => 'El campo "Nombre" es requerido',
            'name.max' => 'El campo "Nombre" es maximo 100 caracteres'
        ]);
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
