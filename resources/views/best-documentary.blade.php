@extends('layout')

@section('title')
    Migliori film documentari - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film documentari</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($documentary_obj->results as $documentary_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $documentary_movie->id }}">
                                <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$documentary_movie->poster_path }}">
                                <h6 class="title-movie">{{ $documentary_movie->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection