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

    public function storeratingRequest($id,$rating_value) 
    {

        $store_rating_request = $this->basetype->ratingValueRequest('550',$_POST['rating-movie']);

    }

}
