@extends('layout')

@section('title')
    Migliori film d'Animazione - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film di animazione</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($animation_obj->results as $animation_movie)
                        <div class="col-md-7 col-lg-3">
                            <div class="film-box">
                            <a href="page-film/{{ $animation_movie->id }}">
                                <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$animation_movie->poster_path }}">
                                <h6 class="title-movie">{{ $animation_movie->title }}</h6>
                            </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('layouts/search-modal')
@endsection