@extends('layout')

@section('title')
    Migliori film di fantascienza
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
                            <a href="page-film/{{ $scifi_movie->id }}">
                                <img src="https://image.tmdb.org/t/p/w200{{$scifi_movie->poster_path }}">
                                <p><strong>{{ $scifi_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection