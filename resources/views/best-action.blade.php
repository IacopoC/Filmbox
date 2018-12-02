@extends('layout')

@section('title')
    Migliori film di azione
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film di azione</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($action_obj->results as $action_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $action_movie->id }}">
                                <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$action_movie->poster_path }}">
                                <h6 class="title-movie">{{ $action_movie->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection