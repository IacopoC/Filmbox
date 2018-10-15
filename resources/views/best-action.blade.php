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
                                <img src="https://image.tmdb.org/t/p/w200{{$action_movie->poster_path }}">
                                <p><strong>{{ $action_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection