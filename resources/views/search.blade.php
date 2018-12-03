@extends('layout')

@section('title')
    Pagina risultati ricerca per {{ $query }}
@endsection
@section('content')
            
    <section>
        <div class="container">
             <div class="margin-up">
            <h3>Ricerca un film</h3>
            <!--Includi barra di ricerca-->
       @include('layouts/search-bar')
            <!--Fine barra di ricerca-->
            </div>
            
            <div class="margin-up">
                @if(!empty($query))
                <h3>Risultati della ricerca per: {{ $query }}</h3>
                @if($_GET['opt-search'] == 'movie')
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
        @endif
        @if($_GET['opt-search'] == 'person')
             @foreach($search_movie->results as $single_person)
            
                    @foreach($single_person->known_for as $single_celeb)
                    <div class="spaced">
                    <div class="row">
                    <div class="col-md-6">
                    <a href="page-film/{{ $single_celeb->id }}">    
                        <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$single_celeb->poster_path }}">
                    </a>
                    </div>
                    <div class="col-md-6">
                        <a href="page-film/{{ $single_celeb->id }}"><h4>{{ $single_celeb->title }}</h4></a>
                        <p>Lingua originale: {{ $single_celeb->original_language}}</p>
                        <p>Titolo originale: {{ $single_celeb->original_title}}</p>
                    </div>
                    </div>
                </div>
                <hr/> 
                    @endforeach     
                      
        @endforeach
        @endif
         @if($_GET['opt-search'] == 'tv')
                    @foreach($search_movie->results as $single_movie)
                <div class="spaced">
                    <div class="row">
                    <div class="col-md-12">
                        <h3>{{ ($single_movie->name) }}</h3>
                    </div>
                    <div class="col-md-6">
                        @if($single_movie->poster_path != '')
                        <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$single_movie->poster_path }}">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <p> <strong>Voto medio:</strong> {{ $single_movie->vote_average }}</p>
                        <p> <strong>Popolarità:</strong> {{ $single_movie->popularity }}</p>
                        <p> <strong>Lingua originale:</strong> {{ $single_movie->original_language }}</p>
                    </div>
                </div>
                </div>
                        <hr />
        @endforeach
        @endif
            </div>
            @endif
        </div>
    </section>
@endsection