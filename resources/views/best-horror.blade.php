@extends('layout')

@section('title')
    Migliori film Horror
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film horror</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($horror_obj->results as $horror_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $horror_movie->id }}">
                                <img src="https://image.tmdb.org/t/p/w200{{$horror_movie->poster_path }}">
                                <p><strong>{{ $horror_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection