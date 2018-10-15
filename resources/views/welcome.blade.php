@extends('layout')

@section('title')
    Home
@endsection

@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
            <h1 class="text-uppercase mb-0">Cerca un film</h1>
            <hr class="star-light">
            <div class="col-lg-7 col-centered center">
                <form action="{{ url('/search') }}" method="get">
            <input class="form-control" name="q" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Ultimi film in sala</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                @foreach($latest_movies_obj->results as $latest_movie)
                <div class="col-md-7 col-lg-3">
                    <div class="film-box">
                    <a href="page-film/{{ $latest_movie->id }}">
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                            </div>
                        </div>
                        @if($latest_movie->poster_path != '')
                        <img src="https://image.tmdb.org/t/p/w200{{$latest_movie->poster_path }}">
                        @endif
                        <p><strong>{{$latest_movie->title }}</strong></p>
                    </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
