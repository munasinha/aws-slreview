<?php

namespace App\Http\Controllers;

use App\Model\Movie;
use Illuminate\Http\Request;
use App\Http\Resources\Movie\MovieCollectionResource;
use App\Http\Resources\Movie\MovieResource;
use App\Model\Actor;
use App\Model\Year;
use App\Model\Category;
use App\Model\Country;
use App\Model\Director;
use App\Model\Musician;
use App\Model\Producer;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MovieCollectionResource::collection(Movie::latest('created_at')->get());
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

        $movie_ev = new Movie;

        $movie_ev->name = $request->input('name');
        $movie_ev->poster = $request->input('poster');
        $movie_ev->covers = $request->input('covers');
        $movie_ev->imdb = $request->input('imdb');
        $movie_ev->trailer = $request->input('trailer');
        $movie_ev->description = $request->input('description');

        $year_id = $request->input('year_id');
        $category_id = $request->input('category_id');
        $actor_id = $request->input('actor_id');
        $country_id = $request->input('country_id');
        $director_id = $request->input('director_id');
        $musicians_id = $request->input('musicians_id');
        $Producer_id = $request->input('Producer_id');
        
        $movie_ev->save();

        $year = Year::find($year_id);
        $actor = Actor::find($actor_id);
        $categories = Category::find($category_id);
        $countries = Country::find($country_id);
        $directors = Director::find($director_id);
        $musicians = Musician::find($musicians_id);
        $Producers = Producer::find($Producer_id);

        $movie_ev->year()->save($year);
        $movie_ev->actors()->saveMany($actor);
        $movie_ev->categories()->saveMany($categories);
        $movie_ev->directors()->saveMany($directors);
        $movie_ev->country()->save($countries);
        $movie_ev->musicians()->saveMany($musicians);
        $movie_ev->producers()->saveMany($Producers);

        return response([

            'data' => new MovieResource($movie_ev)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {

        return new MovieResource($movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->all());

        $year = $request->input('year_id');
        $category = $request->input('category_id');
        $actor = $request->input('actor_id');
        $country = $request->input('country_id');
        $director = $request->input('director_id');
        $musician = $request->input('musicians_id');
        $Producer = $request->input('Producer_id');

         $movie->categories()->sync($category);
         $movie->year()->sync($year);
         $movie->actors()->sync($actor);
         $movie->directors()->sync($director);
         $movie->country()->sync($country);
         $movie->musicians()->sync($musician);
         $movie->producers()->sync($Producer);


        return response([

            'data' => $request->all(),
           

        ],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        

         //$movie->year()->sync();
        //  $movie->actors()->sync([]);
        //  $movie->directors()->sync([]);
        //  $movie->country()->sync([]);
        //  $movie->musicians()->sync([]);
        //  $movie->producers()->sync([]);
        $movie->delete();


        return response([
               "Movie Deleted Sucsessfuly"
        ]);
    }
}
