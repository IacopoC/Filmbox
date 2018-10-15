@extends('layout')

@section('title')
    Film di tendenza
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <div class="row">
                    <div class="col-md-7 col-lg-3">
                      
                        <div class="btn-film">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-scifi') }}"> Migliori film di Fantascienza</a></button>
                    </div>
                      </div>
                      <div class="col-md-7 col-lg-3">
                    <div class="btn-film">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-adventure') }}"> Migliori film di Avventura</a></button>
                    </div>
                </div>
                <div class="col-md-7 col-lg-3">
                    <div class="btn-film">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-action') }}"> Migliori film d'azione</a></button>
                    </div>
                  </div>
                  <div class="col-md-7 col-lg-3">
                    <div class="btn-film">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-comedy') }}"> Migliori film commedia</a></button>
                    </div>
                  </div>
                </div>
                <div class="padding-updown"></div>
                <h2>Film di tendenza</h2>
                <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($trending_obj->results as $trending_movie)
                        <div class="col-md-7 col-lg-3">
                            <a href="page-film/{{ $trending_movie->id }}">
                            <img src="https://image.tmdb.org/t/p/w200{{$trending_movie->poster_path }}">
                            <p><strong>{{ $trending_movie->title }}</strong></p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection