@extends('layout')

@section('title')
    Migliori film documentari
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
                                <img src="https://image.tmdb.org/t/p/w200{{$documentary_movie->poster_path }}">
                                <p><strong>{{ $documentary_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection