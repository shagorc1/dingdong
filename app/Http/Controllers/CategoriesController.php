<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Classes\DataResponse;
use App\Models\Categories;
use App\Services\CategoriesService;

class CategoriesController extends Controller
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
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
