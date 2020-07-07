<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $api_key = "?api_key=4d70e45657de52a76f077a3b931879b9";
        $api_lang_res = "&language=fr-FR";

        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular'. $api_key . $api_lang_res)
            ->json()['results'];

        $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing'. $api_key . $api_lang_res)
            ->json()['results'];

        $genreArrayMovies = Http::get('https://api.themoviedb.org/3/genre/movie/list'. $api_key . $api_lang_res)
            ->json()['genres'];

        $genres = collect($genreArrayMovies)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dump($popularMovies);

        return view('index', [
            "popularMovies" => $popularMovies,
            "nowPlayingMovies" => $nowPlayingMovies,
            "genres" => $genres
        ]);
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
        $api_key = "?api_key=4d70e45657de52a76f077a3b931879b9";
        $api_lang_res = "&language=fr-FR";

        $movie = Http::get("https://api.themoviedb.org/3/movie/$id". $api_key . $api_lang_res . "&append_to_response=credits,videos,images&include_image_language=fr,null")
            ->json();

        // dump($movie);

        return view('show', [
            'movie' => $movie
        ]);
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
}
