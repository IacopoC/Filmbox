<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }

     public function profile()
     {
        
        return view('profile', array('user'=>Auth::user()));
    }

    public function createGuest()
    {
        
      $guestsession = $this->basetype->getGuestSession();  

      return $guestsession;
    }

    public function getguestSessionTk()
    {
        if (Auth::check())
        {
            $id = Auth::user()->id;

        $guest_tk = User::where('id','=', $id)->value('guest_session_tk');

        return $guest_tk;
        }
    }

    public function storeSession(Request $request)
    {

    if (Auth::check())  {   
          $id = Auth::user()->id;
        }

        $guestsession_tk = User::find($id);
        $createguest = $this->createGuest();
        $guestsession_tk->guest_session_tk = $createguest->guest_session_id;
        $guestsession_tk->save(); 
     

         return view('tk-generation');
    }


    public function ratedMovies() 
    {
        $guest_session_tk = $this->getguestSessionTk();
        $rated_movies = $this->basetype->getratedMovie($guest_session_tk);

        return view('account', compact('rated_movies','guest_session_tk'));
    }


    public function updateProfile()
    {
        
        if (Auth::check())  {   
          $id = Auth::user()->id;
        }
            $user =  User::find($id);

             $this->validate(request(), [
            'country' => 'nullable|max:255',
            'hometown' => 'nullable|max:255',
            'twitter_username' =>'nullable|max:255',
            'instagram_username' =>'nullable|max:255',
            'facebook_username' =>'nullable|max:255'
            ]);
    
            $user->country = request('country');
            $user->hometown = request('hometown');
            $user->twitter_username = request('twitter_username');
            $user->instagram_username = request('instagram_username');
            $user->facebook_username = request('facebook_username');
            
            $user->save();

            return view('profile', compact('user'));
    
    }

}
