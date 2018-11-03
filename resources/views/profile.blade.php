@extends('layout')

@section('title')
    Profilo {{ Auth::user()->name }}
@endsection
@section('content')
 <section>
    <div class="container">
        <div class="margin-up">
            <div class="row">
        <div class="col-md-6">
            <div class="image-avatar">
                <img src="{{ 'https://www.gravatar.com/avatar/' . gravatar_img(Auth::user()->email) }} . '?s=200'">
            </div> 
        </div>
        <div class="col-md-6">
            <h4 class="text-uppercase">Pagina profilo {{ Auth::user()->name }}</h4>
             <p><strong>Email:</strong> {{ Auth::user()->email }} </p>
               <div class="panel panel-primary">
                
                    @if(isset($rated_movies))
                    <div class="panel-heading"><h4>Il film che hai votato</h4></div>
                    <div class="panel-body">
                        @foreach($rated_movies->results as $rated_movie)
                        <p>{{ $rated_movie->title }} | Voto: {{ $rated_movie->rating }}</p>
                        @endforeach
                     </div>
                    @endif
                
        </div>
        <a href="#"><button type="button" class="btn btn-info">Modifica profilo</button></a>
        </div>
    </div>
</div>
    </div>
    </section>
@endsection