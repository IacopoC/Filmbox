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
                        <div class="card m-2">
                            <a href="{{ url ('best-scifi') }}"><img class="card-img-top" src="{{ asset('images/genres/science-fiction.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film di fantascienza</h5>
                                <p class="card-text">I migliori film di genere sci-fi</p>
                                <a href="{{ url ('best-scifi') }}" class="card-link">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card m-2">
                            <a href="{{ url ('best-adventure') }}"><img class="card-img-top" src="{{ asset('images/genres/adventure.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film di d'avventura</h5>
                                <p class="card-text">I migliori film di genere avventura</p>
                                <a href="{{ url ('best-adventure') }}" class="card-link">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card m-2">
                            <a href="{{ url ('best-horror') }}"><img class="card-img-top" src="{{ asset('images/genres/horror.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film horror</h5>
                                <p class="card-text">I migliori film di genere horror</p>
                                <a href="{{ url ('best-horror') }}" class="card-link">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card m-2">
                            <a href="{{ url ('best-action') }}"><img class="card-img-top" src="{{ asset('images/genres/action.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film d'azione</h5>
                                <p class="card-text">I migliori film di genere azione</p>
                                <a href="{{ url ('best-action') }}" class="card-link">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-7 col-lg-3">
                        <div class="card m-2">
                            <a href="{{ url ('best-animation') }}"><img class="card-img-top" src="{{ asset('images/genres/animation.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film d'animazione</h5>
                                <p class="card-text">I migliori film d'animazione</p>
                                <a href="{{ url ('best-animation') }}" class="card-link">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card m-2">
                            <a href="{{ url ('best-fantasy') }}"><img class="card-img-top" src="{{ asset('images/genres/fantasy.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film fantasy</h5>
                                <p class="card-text">I migliori film di genere fantasy</p>
                                <a href="{{ url ('best-fantasy') }}" class="card-link">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card m-2">
                            <a href="{{ url ('best-comedy') }}"><img class="card-img-top" src="{{ asset('images/genres/comedy.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori film commedia</h5>
                                <p class="card-text">I migliori film di genere commedia</p>
                                <a href="{{ url ('best-comedy') }}" class="card-link">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-3">
                        <div class="card m-2">
                            <a href="{{ url ('best-documentary') }}"><img class="card-img-top" src="{{ asset('images/genres/documentary.jpg') }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">Migliori documentari</h5>
                                <p class="card-text">I migliori film documentario</p>
                                <a href="{{ url ('best-documentary') }}" class="card-link">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts/search-modal')
@endsection