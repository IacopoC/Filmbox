@extends('layout')

@section('title')
    Account attività - {{ Auth::user()->name }}
@endsection
@section('content')
 <section>
    <div class="container">
        <div class="margin-up">
            <div class="row">
        <div class="col-md-12">
             <h4 class="text-uppercase auth-title">Film e materiali votati da {{ Auth::user()->name }}</h4>
               <div class="panel panel-primary">
                
                    @if(!empty($rated_movies->results))
                    <div class="panel-heading"><h4>Film votati</h4></div>
                    <div class="panel-body">
                       @foreach($rated_movies->results as $rated_movie)
                        <div class="margin-up-15">
                            <div id="movie-rated-{{ $rated_movie->id }}">
                             <p class="d-inline">{{ $rated_movie->title }} | Voto: {{ $rated_movie->rating }}</p>
                            <button class="btn btn-warning delete-movie" onclick="deleteRating('{{ $rated_movie->id }}')">Cancella</button>
                         <a href="/page-film/{{ $rated_movie->id }}"><button class="btn btn-info">Scheda film</button></a>
                        </div>
                    </div>
                    @endforeach
                     </div>
                    @else
                       <div class="alert alert-info" role="alert">
                           Non hai ancora votato nessun film
                       </div>
                   @endif
        </div>
        </div>
        <div class="col-md-12">
            <h4 class="text-uppercase auth-title mt-5">Opzioni</h4>
              <div class="panel panel-primary">
                 <div class="panel-heading"><h4>Esportazione ultimi film</h4></div>
                  <div class="margin-up-15">
              <button class="btn btn-info"><a href="http://files.tmdb.org/p/exports/movie_ids_{{ date('d_m_Y') }}.json.gz">Esporta in ZIP i film</a></button>
          </div>
          </div>
        </div>
       </div>
      </div>
    </div>
    </section>

     <script>
    function deleteRating(movie_id) {
    const api_key = '{{ env('MOVIE_DATABASE_KEY') }}';
    let guest_session_tk = '{{ $guest_session_tk }}';
    let data = "{}";

    let xhr = new XMLHttpRequest();

    let url = 'https://api.themoviedb.org/3/movie/' + movie_id + '/rating?api_key=' + api_key + '&guest_session_id=' + guest_session_tk;
      
    xhr.open('DELETE', url , true);
    xhr.setRequestHeader('Content-type','application/json;charset=utf-8');
    xhr.onreadystatechange = function () {
        if (xhr.status == 200) { 
             let element = document.getElementById('movie-rated-' + movie_id);
            element.classList.add("none");   
        }
    }
        xhr.send(data);
    }    

         </script>
@endsection