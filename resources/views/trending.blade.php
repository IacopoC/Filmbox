@extends('layout')

@section('title')
    Film di tendenza - FilmBox
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
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-action') }}"> Migliori film d'Azione</a></button>
                    </div>
                  </div>
                  <div class="col-md-7 col-lg-3">
                    <div class="btn-film">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-comedy') }}"> Migliori film Commedia</a></button>
                    </div>
                  </div>
                  <div class="col-md-7 col-lg-3">
                    <div class="btn-film padding-updown">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-animation') }}"> Migliori film Animazione</a></button>
                    </div>
                  </div>
                   <div class="col-md-7 col-lg-3">
                    <div class="btn-film padding-updown">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-fantasy') }}"> Migliori film Fantasy</a></button>
                    </div>
                  </div>
                  <div class="col-md-7 col-lg-3">
                    <div class="btn-film padding-updown">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-documentary') }}"> Migliori film Documentari</a></button>
                    </div>
                  </div>
                   <div class="col-md-7 col-lg-3">
                    <div class="btn-film padding-updown">
                        <button type="button" class="btn btn-secondary"><a href="{{ url ('best-horror') }}"> Migliori film Horror</a></button>
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
                            <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$trending_movie->poster_path }}">
                            <h6 class="title-movie"><strong>{{ $trending_movie->title }}</strong></h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <button class="btn-more-results">Più risultati</button>
                         <div id="more-results">
                         </div>
                </div>

            </div>
        </div>
    </section>
@endsection