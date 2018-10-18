@extends('layout')

@section('title')
    Migliori film d'Animazione
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
                            <a href="page-film/{{ $animation_movie->id }}">
                                <img src="https://image.tmdb.org/t/p/w200{{$animation_movie->poster_path }}">
                                <p><strong>{{ $animation_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection