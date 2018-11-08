@extends('layout')

@section('title')
    Account {{ Auth::user()->name }}
@endsection
@section('content')
 <section>
    <div class="container">
        <div class="margin-up">
            <div class="row">
        <div class="col-md-6">
            <div class="image-avatar">
                <img class="img-profile" src="{{ 'https://www.gravatar.com/avatar/' . gravatar_img(Auth::user()->email) }} . '?s=200'">
            </div> 
        </div>
        <div class="col-md-6">
               <h4 class="text-uppercase auth-title">Attività Account {{ Auth::user()->name }}</h4>
               <div class="margin-up"></div>
               <div class="panel panel-primary">
                
                    @if(!empty($rated_movies->results))
                    <div class="panel-heading"><h4>Film votati</h4></div>
                    <div class="panel-body">
                        @foreach($rated_movies->results as $rated_movie)
                        <p>{{ $rated_movie->title }} | Voto: {{ $rated_movie->rating }}</p>
                        @endforeach
                     </div>
                    @endif      
        </div>
        </div>
       </div>
      </div>
    </div>
    </section>

@endsection