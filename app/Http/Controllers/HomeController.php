<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function ratedMovies($guest_session_tk) 
    {
        $guest_session_tk = \DB::table('users')->value('guest_session_tk');

        $rated_movies = $this->basetype->getratedMovie($guest_session_tk);

        return view('home' compact('rated_movies'));
    }

}
