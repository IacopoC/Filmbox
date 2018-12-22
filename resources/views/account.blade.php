@extends('layout')

@section('title')
    Account attività - {{ Auth::user()->name }}
@endsection
@section('content')
 <section>
    <div class="container">
        <div class="margin-up">
            <div class="row">
        <div class="col-md-6">
            <div class="image-avatar">
                <img class="img-profile" src="{{ 'https://www.gravatar.com/avatar/' . gravatar_img(Auth::user()->email) }} . '?s=200'">
            </div> 
        </div>
        <div class="col-md-6">
               <h4 class="text-uppercase auth-title">Attività Account {{ Auth::user()->name }}</h4>
               <div class="margin-up"></div>
               <div class="panel panel-primary">
                
                    @if(!empty($rated_movies->results))
                    <div class="panel-heading"><h4>Film votati</h4></div>
                    <div class="panel-body">
                       @foreach($rated_movies->results as $rated_movie)
                        <div class="margin-up-15">
                            <div id="movie-rated-{{ $rated_movie->id }}">
                             <p class="d-inline">{{ $rated_movie->title }} | Rating: {{ $rated_movie->rating }}</p>
                            <button class="btn btn-warning delete-movie" onclick="deleteRating('{{ $rated_movie->id }}')">Delete</button>
                         <a href="/page-film/{{ $rated_movie->id }}"><button class="btn btn-info">Scheda film</button></a>
                        </div>
                    </div>
                    @endforeach
                     </div>
                    @endif   
        </div>
        </div>
       </div>
      </div>
    </div>
    </section>

     <script>
    function deleteRating(movie_id) {
    var api_key = '{{ env('MOVIE_DATABASE_KEY') }}';
    var guest_session_tk = '{{ $guest_session_tk }}';
    var data = "{}";

    var xhr = new XMLHttpRequest();

    var url = 'https://api.themoviedb.org/3/movie/' + movie_id + '/rating?api_key=' + api_key + '&guest_session_id=' + guest_session_tk;
      
    xhr.open('DELETE', url , true);
    xhr.setRequestHeader('Content-type','application/json;charset=utf-8');
    xhr.onreadystatechange = function () {
        if (xhr.status == 200) { 
             var element = document.getElementById('movie-rated-' + movie_id);
            element.classList.add("none");   
        }
    }
        xhr.send(data);
    }    

         </script>
@endsection