<?php

namespace App\Http\Controllers;

use App\Films;

use Illuminate\Http\Request;

use App\Lists;

use Illuminate\Support\Facades\Auth;

class ListsController extends Controller
{
    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }


    public function createList() {

        if (Auth::check())  {
            $user_id = Auth::user()->id;
        }

        return view('create-list', compact('user_id'));
    }

    public function getMoviesforLists($id) {

        $all_films = Films::with('lists')->find($id);
        return $all_films;

    }

    public function index() {

        $id = Auth::user()->id;
        $all_lists = Lists::where('users_id', $id)->get();

        $film_id = Films::where('id',">",0)->get();

        foreach($film_id as $film) {
            $films[] = $this->getMoviesforLists($film->id);
        }

        return view('lists', compact('all_lists','films'));

    }


    public function createLists(Request $request) {

        $lists_data = new Lists();

        $this->validate(request(), [
            'name' => 'max:50',
            'description' => 'max:255'
        ]);

        $lists_data->name = request('name-field');
        $lists_data->description = request('description-field');
        $lists_data->users_id = request('user-id');

        $lists_data->save();

        return view('thankyou');
    }

    public function updateMovie(Request $request) {

        $movie_data = new Films();

        $this->validate(request(), [
            'list_select' => 'max:50',
            'film_id' => 'max:50',
        ]);

        $movie_data->content = request('film_id');
        $movie_data->lists_id = request('list_select');
        $movie_data->save();

        return view('thankyou-add');

    }

}