@extends('layout')

@section('title')
    Pagina film {{ $film_obj->title }}
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                 <div class="row">
                     <div class="col-md-12">
                         <h1>{{ ($film_obj->title) }}</h1>
                     </div>
                        
                        <div class="col-md-6">
                            @if($film_obj->poster_path !='')
                        <img class="img-poster" src="https://image.tmdb.org/t/p/w400{{$film_obj->poster_path }}">
                            @endif
                        </div>

                        <div class="col-md-6">
                         @if($film_obj->overview !='')   
                            <h3>Trama</h3>
                            <p>{{ $film_obj->overview }}</p>
                         @endif
                            <?php foreach ($film_obj->genres as $film_genre):
                            $result_genre[] = $film_genre->name;
                            endforeach; ?>
                            @if(isset($result_genre))
                            <p><strong>Genere:</strong> {{ implode(", ",$result_genre) }} </p>
                            @endif
                            <p><strong>Voto medio:</strong> {{ $film_obj->vote_average }}</p>
                            
                            <?php if (Auth::check()): ?>
                            <form method="POST" name="movie-rating" class="movie-rating-vote">
                                {{ csrf_field() }}
                           <fieldset>
                            <span class="star-cb-group">

                            <?php for ($i = 1; $i <=10; $i++) { ?>
                                <input type="radio" id="rating-<?php echo $i ?>" name="rating" value="<?php echo $i;?>" /><label for="rating-10"><?php echo $i;?></label>
                            <?php } ?>

                            </span>
                            <input id="movieId" name="movie-id" type="hidden" value="{{ $id }}">
                            </fieldset>
                                <button type="submit" class="btn btn-primary">
                                    Vota
                                </button>
                            </form>
<<<<<<< HEAD
                            <div class="margin-up">
                            <h6 id="rated-message"></h6>
                          </div>
=======
>>>>>>> master
                        <?php endif; ?>
                        </div>
                       </div>
                    </div>
                </div>
        </section>
        <!-- Sezione film simili -->

        @if(!empty($similar_obj->results))
        <section>
        <div class="container">
                 <div class="row">
                        <div class="col-md-12">
                            <h3>Film simili:</h3>
                        </div> 
                    @foreach($similar_obj->results as $similar_movie)
                      <div class="col-md-7 col-lg-2">
                            <a href="{{ $similar_movie->id }}">
                            @if($similar_movie->poster_path != '')
                            <img class="img-poster" src="https://image.tmdb.org/t/p/w154{{$similar_movie->poster_path }}">
                            @endif
                         <p class="title-movie">{{$similar_movie->title }}</p>
                        </a>
                      </div>
                    @endforeach
                </div>
             </div>
         </section>
         @endif
         <!--Fine film simili-->
<<<<<<< HEAD

         <script>
        
    document.getElementById('rating-form').addEventListener('submit',getRating);

    function getRating(e) {
        e.preventDefault();

        var name = document.querySelector('input[name="rating"]:checked').value;
        var param = JSON.stringify({ "value": name });
        var api_key = '{{ env('MOVIE_DATABASE_KEY') }}';
        var movie_id = '{{ $film_obj->id }}';
        var guest_session_tk = '{{ $guest_tk }}';

        var xhr = new XMLHttpRequest();

        var url = 'https://api.themoviedb.org/3/movie/' + movie_id + '/rating?api_key=' + api_key + '&guest_session_id=' + guest_session_tk;
      
        xhr.open('POST', url , true);
        xhr.setRequestHeader('Content-type','application/json;charset=utf-8');
        xhr.onreadystatechange = function () {
            if (xhr.status == 200) {
                 console.log(xhr.responseText);    
            }
        }
        document.getElementById('rated-message').innerHTML = 'Grazie per aver votato <a href="/account">Elenco film votati <i class="fa fa-arrow-right"></a>';
        xhr.send(param);
    }

         </script>
=======
>>>>>>> master
@endsection