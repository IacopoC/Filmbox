<?php

namespace App\Http\Controllers;

use App\Films;

use Illuminate\Http\Request;

use App\Lists;

use Illuminate\Support\Facades\Auth;

class ListsController extends Controller
{

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

    public function getallLists() {

        $id = Auth::user()->id;
        $lists = Lists::where('users_id', $id)->get();

        return $lists;
    }


    public function getallFilms() {

        $film_id = Films::where('id',">",0)->get();

        foreach($film_id as $film) {
            $films[] = $this->getMoviesforLists($film->id);
        }

        return $films;
    }

    public function index() {

        $all_lists = $this->getallLists();
        $films = $this->getallFilms();


        if(empty($films)) {
            return view('lists', compact('all_lists'));
        }
          return view('lists', compact('all_lists', 'films'));

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

        $movie_data->content_name = request('film_name');
        $movie_data->content = request('film_id');
        $movie_data->lists_id = request('list_select');
        $movie_data->save();

    }

    public function deleteMovie(Request $request) {

        $film_id = request('film_id');
        Films::where('id',"=",$film_id)->delete();

        $all_lists = $this->getallLists();
        $films = $this->getallFilms();

        if(empty($films)) {
            return view('lists', compact('all_lists'));
        }
        return view('lists', compact('all_lists', 'films'));

    }


    public function deleteLists() {
        $list_id = request('lists_id');

        Lists::where('id',"=",$list_id)->delete();
        Films::where('lists_id',"=",$list_id)->delete();

        return view('thankyou-list');
    }
}
