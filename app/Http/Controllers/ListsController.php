<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lists;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class ListsController extends Controller
{
    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }


    public function index() {

        if (Auth::check())  {
            $user_id = Auth::user()->id;
        }

        return view('create-list', compact('user_id'));
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

        $list_id = Input::get('list_select');

        $movie_data = Lists::where('id','=',$list_id)->first();

        $this->validate(request(), [
            'film_id' => 'max:50',
        ]);

        $movie_data->content = request('film_id');
        $movie_data->save();

        return view('thankyou-add');

    }

    public function lists() {

        $id = Auth::user()->id;
        $all_lists = Lists::where('users_id', $id)->get();

        return view('lists', compact('all_lists'));
    }
}
