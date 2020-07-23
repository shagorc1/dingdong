<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

use App\Classes\DataResponse;
use App\Models\Plans;
use App\Services\PlansService;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $plan = [];
        return view('plans.form', compact(['plan', 'request']));
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
            'description' => 'required|max:300',
            'price' => 'required',
        ], [
            'name.required' => 'El campo "Nombre" es requerido',
            'name.max' => 'El campo "Nombre" es maximo 100 caracteres',
            'description.required' => 'El campo "Descripcion" es requerido',
            'description.max' => 'El campo "Description" es maximo 300 caracteres',
            'price.required' => 'El campo "Price" es requerido',
        ]);
        
        $plan = Plans::create($validatedData);

        return redirect()->route('plans-edit', $plan->id)->with('success', 'Plan creado');
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
        
        $plans = PlansService::paginate($search);
        $totalCount = (int)$plans->count();
        $dataResponse = new DataResponse();             
        $dataResponse->data = $plans->offset($start)->limit($numberPerPage)->get();
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
    public function edit($id, Request $request)
    {
        $plan = Plans::find($id);
        if (!empty($plan)) {
            return view('plans.form', compact(['plan', 'request']));
        } else {
            return redirect()->route('plans-index');
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
            'name' => 'required|max:100',
            'description' => 'required|max:300',
            'price' => 'required',
        ], [
            'name.required' => 'El campo "Nombre" es requerido',
            'name.max' => 'El campo "Nombre" es maximo 100 caracteres',
            'description.required' => 'El campo "Descripcion" es requerido',
            'description.max' => 'El campo "Description" es maximo 300 caracteres',
            'price.required' => 'El campo "Price" es requerido',
        ]);
        Plans::whereId($id)->update($validatedData);

        return redirect()->route('plans-edit', $id)->with('success', 'Plan actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Plans::find($id);
        $name = $cate->name;
        $cate->active = 0;
        $cate->save();

        return redirect()->route('plans-index')->with('success', 'Plan "' . $name . '" eliminado');
    }
}
