<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = [];
        return view('categories.form', compact('category'));
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
        $cate = Categories::create($validatedData);

        return redirect()->route('categories-edit', $cate->id)->with('success', 'Categoria creada');
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
        
        $categories = CategoriesService::paginate($search);
        $totalCount = (int)$categories->count();
        $dataResponse = new DataResponse();             
        $dataResponse->data = $categories->offset($start)->limit($numberPerPage)->get();
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
        $category = Categories::find($id);
        if (!empty($category)) {
            return view('categories.form', compact('category'));
        } else {
            return redirect()->route('categories-index');
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
        Categories::whereId($id)->update($validatedData);

        return redirect()->route('categories-edit', $id)->with('success', 'Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Categories::find($id);
        $name = $cate->name;
        $cate->active = 0;
        $cate->save();

        return redirect()->route('categories-index')->with('success', 'Categoria "' . $name . '" eliminada');
    }
}
