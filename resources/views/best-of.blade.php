@extends('layout')

@section('title')
    I migliori film - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>I migliori film per genere</h2>
                <div class="row mt-5">
                    <div class="col-md-7 col-lg-3">
                        <div class="card">
                            <a href="{{ url ('best-scifi') }}"><img class="card-img-top" src="{{ url('images/filmbox-genres.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film di fantascienza</h5>
                                <p class="card-text">I migliori film di genere sci-fi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card">
                            <a href="{{ url ('best-adventure') }}"><img class="card-img-top" src="{{ url('images/filmbox-genres.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film di d'avventura</h5>
                                <p class="card-text">I migliori film di genere avventura</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card">
                            <a href="{{ url ('best-horror') }}"><img class="card-img-top" src="{{ url('images/filmbox-genres.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film horror</h5>
                                <p class="card-text">I migliori film di genere horror</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card">
                            <a href="{{ url ('best-action') }}"><img class="card-img-top" src="{{ url('images/filmbox-genres.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film d'azione</h5>
                                <p class="card-text">I migliori film di genere azione</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-7 col-lg-3">
                        <div class="card">
                            <a href="{{ url ('best-animation') }}"><img class="card-img-top" src="{{ url('images/filmbox-genres.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film d'animazione</h5>
                                <p class="card-text">I migliori film d'animazione</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card">
                            <a href="{{ url ('best-fantasy') }}"><img class="card-img-top" src="{{ url('images/filmbox-genres.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film fantasy</h5>
                                <p class="card-text">I migliori film di genere fantasy</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card">
                            <a href="{{ url ('best-commedy') }}"><img class="card-img-top" src="{{ url('images/filmbox-genres.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film commedia</h5>
                                <p class="card-text">I migliori film di genere commedia</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card">
                            <a href="{{ url ('best-documentary') }}"><img class="card-img-top" src="{{ url('images/filmbox-genres.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori documentari</h5>
                                <p class="card-text">I migliori film documentario</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection