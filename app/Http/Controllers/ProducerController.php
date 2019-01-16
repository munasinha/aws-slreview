<?php

namespace App\Http\Controllers;

use App\Model\Producer;
use Illuminate\Http\Request;
use App\Http\Resources\Producer\ProducerCollectionResource;
use App\Http\Resources\Producer\ProducerResource;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProducerCollectionResource::collection(Producer::oldest('name')->get());
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
        $producer = new Producer;

        $producer->name = $request->input('name');
        $producer->image = $request->input('image');
        $producer->country = $request->input('country');
        $producer->first_movie = $request->input('first_movie');
        $producer->best_movie = $request->input('best_movie');
        $producer->imdb_best_movie = $request->input('imdb_best_movie');

        $producer->save();

        return response([

            'data' => new ProducerResource($producer)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function show(Producer $producer)
    {
        return new ProducerResource($producer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit(Producer $producer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producer $producer)
    {
        $producer->update($request->all());

         return response([
             'data' => "Upadte Sucsessfuly"
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producer $producer)
    {
        $producer->delete();


        return response([
               "Producer Deleted Sucsessfuly"
        ]);
    }
}
