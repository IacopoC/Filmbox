<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }

    public function index($id)
    {
        $film_obj = $this->basetype->getMovie($id);

        return view('page-film', compact('film_obj'));

    }

    public function sciFi()
    {
        $scifi_obj = $this->basetype->getDiscoverMovie('878');


        return view('best-scifi', compact('scifi_obj'));
    }

       public function adventure()
    {
        $adventure_obj = $this->basetype->getDiscoverMovie('12');


        return view('best-adventure', compact('adventure_obj'));
    }

        public function action()
    {
        $action_obj = $this->basetype->getDiscoverMovie('28');


        return view('best-action', compact('action_obj'));
    }

        public function comedy()
    {
        $comedy_obj = $this->basetype->getDiscoverMovie('35');


        return view('best-comedy', compact('comedy_obj'));
    }
}
