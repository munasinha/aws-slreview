<?php

namespace App\Http\Controllers;

use App\Model\Year;
use Illuminate\Http\Request;
use App\Http\Resources\Year\YearResource;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return YearResource::collection(Year::latest('year')->get());
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
        $year = new Year;

        $year->year = $request->input('year');

        $year->save();

        return response([

            'data' => new YearResource($year)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        return new YearResource($year);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit(Year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Year $year)
    {
        $year->update($request->all());

         return response([
             'data' => "Upadte Sucsessfuly"
         ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy(Year $year)
    {
        $year->delete();


        return response([
               "Year Deleted Sucsessfuly"
        ]);
    }
}
