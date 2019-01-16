<?php

namespace App\Http\Controllers;

use App\Model\Book;
use Illuminate\Http\Request;
use App\Http\Resources\Book\BookCollectionResource;
use App\Http\Resources\Book\BookResource;
use App\Model\Author;
use App\Model\Year;
use App\Model\Category;
use App\Model\Country;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookCollectionResource::collection(Book::latest('created_at')->get());
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
        $book = new Book;

        $book->name = $request->input('name');
        $book->poster = $request->input('poster');
        $book->covers = $request->input('covers');
        $book->description = $request->input('description');

        $year_id = $request->input('year_id');
        $category_id = $request->input('category_id');
        $author_id = $request->input('author_id');
        $country_id = $request->input('country_id');
        
        
        $book->save();

        $year = Year::find($year_id);
        $author = Author::find($author_id);
        $categories = Category::find($category_id);
        $countries = Country::find($country_id);
      

        $book->year()->saveMany($year);
        $book->authors()->saveMany($author);
        $book->categories()->saveMany($categories);
        $book->country()->saveMany($countries);
  

        return response([

            'data' => new BookResource($book)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        $year = $request->input('year_id');
        $category = $request->input('category_id');
        $author = $request->input('author_id');
        $country = $request->input('country_id');
 

         $book->categories()->sync($category);
         $book->year()->sync($year);
         $book->authors()->sync($author);
         $book->country()->sync($country);



        return response([

            'data' => $request->all(),
           

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response([
               "Book Deleted Sucsessfuly"
        ]);
    }
}
