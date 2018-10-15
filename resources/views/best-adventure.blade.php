@extends('layout')

@section('title')
    Migliori film di avventura
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film di avventura</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($adventure_obj->results as $adventure_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $adventure_movie->id }}">
                                <img src="https://image.tmdb.org/t/p/w200{{$adventure_movie->poster_path }}">
                                <p><strong>{{ $adventure_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection