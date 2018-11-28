@extends('layout')

@section('title')
    Pagina risultati ricerca
@endsection
@section('content')
            
    <section>
        <div class="container">
        <div class="margin-up">
            <h3>Ricerca un film</h3>
        <form action="{{ url('/search') }}" method="get">
            <input class="form-control searchfilm-field" name="q" type="text" placeholder="Cerca per titolo..." aria-label="Search"><input type="submit" class="btn btn-default searchfilm-btn" value="Cerca">
                </form>
            </div>   
            <div class="margin-up">
                <h3>Risultati della ricerca per: {{ $query }}</h3>
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
                        <a href="page-film/{{ $single_movie->id }}">
                        <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$single_movie->poster_path }}">
                        </a>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <p> <strong>Voto medio:</strong> {{ $single_movie->vote_average }}</p>
                        <p> <strong>Titolo originale:</strong> {{ $single_movie->original_title }}</p>
                        <p> <strong>Popolarità:</strong> {{ $single_movie->popularity }}</p>
                        <p> <strong>Lingua originale:</strong> {{ $single_movie->original_language }}</p>
                    </div>
                </div>
                </div>
                        <hr />
        @endforeach
            </div>
        </div>
    </section>
@endsection