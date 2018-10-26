@extends('layout')

@section('title')
    Migliori film fantasy
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film fantasy</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($fantasy_obj->results as $fantasy_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $fantasy_movie->id }}">
                                <img src="https://image.tmdb.org/t/p/w200{{$fantasy_movie->poster_path }}">
                                <p><strong>{{ $fantasy_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection