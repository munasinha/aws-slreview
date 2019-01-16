<?php

namespace App\Http\Controllers;

use App\Model\Tvshow;
use Illuminate\Http\Request;
use App\Http\Resources\Tvshow\TvshowResource;
use App\Http\Resources\Tvshow\TvshowCollectionResource;
use App\Model\Year;
use App\Model\Actor;
use App\Model\Category;
use App\Model\Director;
use App\Model\Musician;
use App\Model\Producer;
use App\Model\Country;

class TvshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TvshowCollectionResource::collection(Tvshow::latest('created_at')->get());
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


        $tvshow = new Tvshow;

        $tvshow->name = $request->input('name');
        $tvshow->poster = $request->input('poster');
        $tvshow->covers = $request->input('covers');
        $tvshow->imdb = $request->input('imdb');
        $tvshow->trailer = $request->input('trailer');
        $tvshow->description = $request->input('description');

        $year_id = $request->input('year_id');
        $category_id = $request->input('category_id');
        $actor_id = $request->input('actor_id');
        $country_id = $request->input('country_id');
        $director_id = $request->input('director_id');
        $musicians_id = $request->input('musicians_id');
        $Producer_id = $request->input('Producer_id');
        

        $tvshow->save();


        $year = Year::find($year_id);
        $actor = Actor::find($actor_id);
        $categories = Category::find($category_id);
        $directors = Director::find($director_id);
        $musicians = Musician::find($musicians_id);
        $Producers = Producer::find($Producer_id);
        $countries = Country::find($country_id);

        $tvshow->year()->save($year);
        $tvshow->actors()->saveMany($actor);
        $tvshow->categories()->saveMany($categories);
        $tvshow->directors()->saveMany($directors);
        $tvshow->musicians()->saveMany($musicians);
        $tvshow->producers()->saveMany($Producers);
        $tvshow->country()->save($countries);

        return response([

            'data' => new TvshowResource($tvshow)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tvshow = Tvshow::all()->where('id', $id);

        return  TvshowResource::collection($tvshow); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function edit(Tvshow $tvshow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $tvshow =Tvshow::all()->where('id', $id);

        $tvshow->first()->update($request->all());

        $year = $request->input('year_id');
        $category = $request->input('category_id');
        $actor = $request->input('actor_id');
        $country = $request->input('country_id');
        $director = $request->input('director_id');
        $musician = $request->input('musicians_id');
        $Producer = $request->input('Producer_id');

        //return $actor;

         //$tvshow->categories()->sync($category);
         //$tvshow->year()->sync($year);
         $tvshow->actors()->sync($actor);
         $tvshow->directors()->sync($director);
         $tvshow->country()->sync($country);
         $tvshow->musicians()->sync($musician);
         $tvshow->producers()->sync($Producer);


        return response([

            'data' => $request->all(),
           

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Tvshow  $tvshow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tvshow $tvshow)
    {
        $tvshow->delete();


        return response([
               "Tvshow Deleted Sucsessfuly"
        ]);
    }
}
