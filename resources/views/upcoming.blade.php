@extends('layout')

@section('title')
    Film in arrivo
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Film in arrivo</h2>
                <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($upcoming_obj->results as $upcoming_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $upcoming_movie->id }}">
                            <img src="https://image.tmdb.org/t/p/w200{{$upcoming_movie->poster_path }}">
                            <p><strong>{{ $upcoming_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection