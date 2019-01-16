<?php

namespace App\Http\Controllers;

use App\Model\Director;
use Illuminate\Http\Request;
use App\Http\Resources\Director\DirectorCollectionResource;
use App\Http\Resources\Director\DirectorResource;


class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DirectorCollectionResource::collection(Director::oldest('name')->get());
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
        $director = new Director;

        $director->name = $request->input('name');
        $director->image = $request->input('image');
        $director->country = $request->input('country');
        $director->first_movie = $request->input('first_movie');
        $director->best_movie = $request->input('best_movie');
        $director->imdb_best_movie = $request->input('imdb_best_movie');

        $director->save();

        return response([

            'data' => new DirectorResource($director)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        return new DirectorResource($director);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Director $director)
    {
        $director->update($request->all());

         return response([
             'data' => "Upadte Sucsessfuly"
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        $director->delete();


        return response([
               "Director Deleted Sucsessfuly"
        ]);
    }
}
