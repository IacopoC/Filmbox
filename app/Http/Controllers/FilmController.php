<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

class FilmController extends Controller
{
    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }

        public function getguestSessionTk()
    {
        $guest_tk = \DB::table('users')->value('guest_session_tk');

        return $guest_tk;
    }
    

    public function index($id)
    {

        $guest_tk = $this->getguestSessionTk();

        $film_obj = $this->basetype->getMovie($id);

        $similar_obj = $this->basetype->getSimilarMovie($id);

        $trailer_obj = $this->basetype->getVideoTMovie($id);

        return view('page-film', compact('film_obj','id', 'similar_obj','guest_tk','trailer_obj'));

    }


    /*
    *  Metodi per pagine film di genere
    *
    */

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

        public function animation()
    {
        $animation_obj = $this->basetype->getDiscoverMovie('16');


        return view('best-animation', compact('animation_obj'));
    }

          public function fantasy()
    {
        $fantasy_obj = $this->basetype->getDiscoverMovie('14');


        return view('best-fantasy', compact('fantasy_obj'));
    }

           public function documentary()
    {
        $documentary_obj = $this->basetype->getDiscoverMovie('99');


        return view('best-documentary', compact('documentary_obj'));
    }


         public function horror()
    {
        $horror_obj = $this->basetype->getDiscoverMovie('27');


        return view('best-horror', compact('horror_obj'));
    }
}
