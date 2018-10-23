<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(BaseType $basetype)
    {
        $this->basetype = $basetype;
    }

    public function createGuest()
    {
        
      $guestsession = $this->basetype->getGuestSession();  

      return $guestsession;
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
     

         return view('home');
    }

    public function storeratingRequest($guest_session_tk) 
    {
        if (Auth::check())  {   
    
        $input_post = Input::get('rating');

        $guest_session_tk = \DB::table('users')->value('guest_session_tk');

        $store_rating_request = $this->basetype->ratingValueRequest($input_post, $guest_session_tk);

        return 'Value Stored';
        }

    }

}
