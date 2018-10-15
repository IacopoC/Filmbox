@extends('layout')

@section('title')
    Pagina risultati ricerca
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h3>Risultati della ricerca per {{ $query }}</h3>
                    @foreach($search_movie->results as $single_movie)
                <div class="spaced">
                    <div class="row">
                    <div class="col-md-12">
                        <a href="page-film/{{ $single_movie->id }}">
                        <h3>{{ ($single_movie->title) }}</h3>
                        </a>
                    </div>
                    <div class="col-md-6">
                        @if($single_movie->poster_path != '')
                        <img src="https://image.tmdb.org/t/p/w200{{$single_movie->poster_path }}">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <p> Voto medio: {{ $single_movie->vote_average }}</p>
                        <p> Titolo originale: {{ $single_movie->original_title }}</p>
                        <p>Popolarità: {{ $single_movie->popularity }}</p>
                    </div>
                </div>
                </div>
                        <hr />
        @endforeach
            </div>
        </div>
    </section>
@endsection