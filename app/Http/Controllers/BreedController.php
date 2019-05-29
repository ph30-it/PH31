<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use App\Cat;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // \DB::enableQueryLog();
        // $listCats = Cat::all();
        $listBreeds= Breed::with('cats')->get();
        // dd(\DB::getQueryLog());
        // dd($listBreeds);
        return view('breed.index', compact('listBreeds'));
        //'select * from breeds ';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function listAllCatByBreedId($id)
    {
        // cách 1 
        $listCats= Cat::where('breed_id', $id)->get();
        $breed = Breed::find($id);

        //tương tự
        $listCats= Cat::with('breed')->where('breed_id', $id)->get();

        dd($listCats);
        // cách 2
        // $listCats= Breed::find($id)->cats;
        return view('cat.list_by_breed', compact('listCats'));
    }
}
