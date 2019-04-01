@extends('layout')

@section('title')
    Migliori film di fantascienza - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film di fantascienza</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($scifi_obj->results as $scifi_movie)
                        <div class="col-md-7 col-lg-3">
                            <div class="film-box">
                            <a href="page-film/{{ $scifi_movie->id }}">
                                <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$scifi_movie->poster_path }}">
                                <h6 class="title-movie">{{ $scifi_movie->title }}</h6>
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