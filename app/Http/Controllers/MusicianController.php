<?php

namespace App\Http\Controllers;

use App\Model\Musician;
use Illuminate\Http\Request;
use App\Http\Resources\Musician\MusicianResource;
use App\Http\Resources\Musician\MusicianCollectionResource;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MusicianCollectionResource::collection(Musician::oldest('name')->get());
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
        $musician = new Musician;

        $musician->name = $request->input('name');
        $musician->image = $request->input('image');
        $musician->country = $request->input('country');
        $musician->first_movie = $request->input('first_movie');
        $musician->best_movie = $request->input('best_movie');
        $musician->imdb_best_movie = $request->input('imdb_best_movie');

        $musician->save();

        return response([

            'data' => new MusicianResource($musician)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Musician  $musician
     * @return \Illuminate\Http\Response
     */
    public function show(Musician $musician)
    {
        return new MusicianResource($musician);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Musician  $musician
     * @return \Illuminate\Http\Response
     */
    public function edit(Musician $musician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Musician  $musician
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musician $musician)
    {
        $musician->update($request->all());

         return response([
             'data' => "Upadte Sucsessfuly"
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Musician  $musician
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musician $musician)
    {
        $musician->delete();


        return response([
               "Musician Deleted Sucsessfuly"
        ]);
    }
}
