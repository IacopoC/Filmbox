@extends('layout')

@section('title')
    Migliori film commedia
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
                            <a href="page-film/{{ $comedy_movie->id }}">
                                <img src="https://image.tmdb.org/t/p/w200{{$comedy_movie->poster_path }}">
                                <p><strong>{{ $comedy_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection