<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('name');

            $table->string('poster');

            $table->string('covers');

            $table->double('imdb');

            // $table->integer('year_id')->unsigned()->index();
            // $table->foreign('year_id')->references('id')->on('years');

            // $table->integer('category_id')->unsigned()->index();
            // $table->foreign('category_id')->references('id')->on('categories');

            // $table->integer('actor_id')->unsigned()->index();
            // $table->foreign('actor_id')->references('id')->on('actors');

            // $table->integer('country_id')->unsigned()->index();
            // $table->foreign('country_id')->references('id')->on('countries');

            // $table->integer('director_id')->unsigned()->index();
            // $table->foreign('director_id')->references('id')->on('directors');

            // $table->integer('musicians_id')->unsigned()->index();
            // $table->foreign('musicians_id')->references('id')->on('musicians');

            // $table->integer('Producer_id')->unsigned()->index();
            // $table->foreign('Producer_id')->references('id')->on('producers');

            $table->string('trailer')->nullable();

            $table->longText('description'); 

            $table->integer('view_count')->default('0');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
