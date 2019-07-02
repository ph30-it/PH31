<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use App\Cat;
use App\Http\Requests\CreateCatRequest;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCats = Cat::all();
        return view('cat.index', compact('listCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listBreed = Breed::all();
        return view('cat.create', compact('listBreed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatRequest $request)
    {
        $data = $request->except('_token');
        
        // Cat::insert($data); // tạo 1 record trong bảng cat
        $cat= Cat::create($data);
        return redirect()->route('list-cats')->with('success' , 'create cat success');
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
        $cat = Cat::find($id);
        $listBreeds= Breed::all();
        return view('cat.edit', compact('cat', 'listBreeds'));
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
        $data = $request->except('_token', '_method');
        $cat = Cat::find($id);
        $cat->update($data);
        return redirect()->route('list-cats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cach 1
        $cat = Cat::find($id);
        $cat->delete();

        //cach 2
        // Cat::destroy($id);
        return redirect()->route('list-cats');
    }
}
