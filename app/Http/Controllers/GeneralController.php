<?php

namespace App\Http\Controllers;


class GeneralController extends Controller
{

    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }


    public function index() {

        $latest_movies_obj = $this->basetype->getLatestMovies();

        return view('welcome', compact( 'latest_movies_obj'));
    }

    public function search() {

        $query = $_GET['q'];

        $type_media = $_GET['opt-search'];

        $search_movie = $this->basetype->searchMovie($type_media, $query);

        return view('search', compact('search_movie', 'query'));
    }

    public function trending() {

        $trending_obj = $this->basetype->getTrendingMovie('movie','week');

        return view('trending', compact('trending_obj'));
    }

    public function upcoming() {

        $upcoming_obj = $this->basetype->getMovie('upcoming');

        return view('upcoming', compact('upcoming_obj'));
    }

    
}
