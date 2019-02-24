<?php

namespace App\Http\Controllers;

use App\Lists;

use App\User;

use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }

        public function getguestSessionTk()
    {
        if (Auth::check())
        {
            $id = Auth::user()->id;

            $guest_tk = User::where('id', '=', $id)->value('guest_session_tk');

            return $guest_tk;
        }
    }

       public function getLists()
    {
        if(Auth::check())
        {
            $id = Auth::user()->id;
            $all_lists = Lists::where('users_id', $id)->get();

            return $all_lists;
        }
    }
    

    public function index($id)
    {

        $guest_tk = $this->getguestSessionTk();

        $film_obj = $this->basetype->getMovie($id);

        $dates_obj = $this->basetype->getReleaseDates($id);

        $similar_obj = $this->basetype->getSimilarMovie($id);

        $trailer_obj = $this->basetype->getVideoTMovie($id);

        $credits_obj = $this->basetype->getCredits($id);

        $lists = $this->getLists();

        return view('page-film', compact('film_obj','id', 'similar_obj','guest_tk','trailer_obj','dates_obj','credits_obj','lists'));

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
