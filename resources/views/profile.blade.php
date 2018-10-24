@extends('layout')

@section('title')
    Profilo {{ Auth::user()->name }}
@endsection
@section('content')
 <section>
    <div class="container">
        <div class="margin-up">
            <h4 class="text-uppercase">Pagina profilo {{ Auth::user()->name }}</h4>
            <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    <h3>Il film che hai votato</h3>
                    @if(isset($rated_movies))
                        @foreach($rated_movies->results as $rated_movie)
                        <p><strong>{{ $rated_movie->title }}</strong> | Voto: {{ $rated_movie->rating }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </section>
@endsection