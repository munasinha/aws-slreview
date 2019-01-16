<?php

namespace App\Http\Controllers;

use App\Model\Actor;
use Illuminate\Http\Request;
use App\Http\Resources\Actor\ActorResource;
use App\Http\Resources\Actor\ActorCollectionResource;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActorCollectionResource::collection(Actor::oldest('name')->get());
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
        $actor = new Actor;

        $actor->name = $request->input('name');
        $actor->image = $request->input('image');
        $actor->country = $request->input('country');
        $actor->first_movie = $request->input('first_movie');
        $actor->best_movie = $request->input('best_movie');
        $actor->imdb_best_movie = $request->input('imdb_best_movie');

        $actor->save();

        return response([

            'data' => new ActorResource($actor)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        return new ActorResource($actor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
         $actor->update($request->all());

         return response([
             'data' => "Upadte Sucsessfuly"
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();


        return response([
               "Actor Deleted Sucsessfuly"
        ]);
    }
}
