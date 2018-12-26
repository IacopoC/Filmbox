@extends('layout')

@section('title')
    Film in arrivo - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Film in arrivo</h2>
                <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($upcoming_obj->results as $upcoming_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $upcoming_movie->id }}">
                            <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$upcoming_movie->poster_path }}">
                            <h6 class="title-movie">{{ $upcoming_movie->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection