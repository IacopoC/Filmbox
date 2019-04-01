@extends('layout')

@section('title')
    Migliori film commedia - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film commedia</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($comedy_obj->results as $comedy_movie)
                        <div class="col-md-7 col-lg-3">
                            <div class="film-box">
                            <a href="page-film/{{ $comedy_movie->id }}">
                                <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$comedy_movie->poster_path }}">
                                <h6 class="title-movie">{{ $comedy_movie->title }}</h6>
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