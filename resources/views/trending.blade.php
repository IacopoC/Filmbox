@extends('layout')

@section('title')
    Film di tendenza - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <div class="row">
                <h2>Film di tendenza</h2>
                <div class="row mt-5">
                    @foreach ($trending_obj->results as $trending_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $trending_movie->id }}">
                            <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$trending_movie->poster_path }}">
                            <h6 class="title-movie"><strong>{{ $trending_movie->title }}</strong></h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                    <div class="col-lg-12">
                    <div class="button-box">
                    <button class="btn-secondary btn-more-results-trending">Mostra più risultati  <i class="fa fa-fw fa-chevron-down"></i></button>
                    </div>
                        <div class="row more-results">
                        </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection