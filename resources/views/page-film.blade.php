@extends('layout')

@section('title')
    Film {{ $film_obj->title }} - FilmBox
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
                          @if(!empty($trailer_obj->results))
                          <p><strong>Trailer disponibili:</strong>
                            <?php $i = 0; ?>
                            @foreach($trailer_obj->results as $trailer_content)
                           <?php $i++; ?> 
                             <a href="https://www.youtube.com/watch?v={{ $trailer_content->key }}" target="_blank">Trailer {{ $i }}</a>
                            @endforeach
                            </p> 
                           @endif 
                            <p><strong>Voto medio:</strong> {{ $film_obj->vote_average }}</p>
                            
                            <?php if (Auth::check()): ?>
                            <form  name="movie-rating" id="rating-form">
                                {{ csrf_field() }}
                           <fieldset>
                            <p><strong>Vota:</strong></p>
                            <div class="rating-fields">
                            <span class="star-cb-group">
                              <label for="sad">
                                <input type="radio" id="rating-id-4" class="sad" name="rating" value="4" />
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" /></svg></label>

                                <label for="neutral">
                                <input type="radio" id="rating-id-6" class="neutral" name="rating" value="6" /><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" /></svg></label>

                                <label for="happy">
                                <input type="radio" id="rating-id-8" class="happy" name="rating" value="8" />
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" /></svg></label>
                                
                                <label for="super-happy">
                                <input type="radio" id="rating-id-10" class="super-happy" name="rating" value="10" />
                                <svg viewBox="0 0 24 24"><path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg></label>

                            </span>
                          </div>
                            <input id="movieId" name="movie-id" type="hidden" value="{{ $id }}">
                            </fieldset>
                                <button type="submit" class="btn btn-primary">
                                    Vota
                                </button>
                            </form>
                            <div class="margin-up">
                            <h6 id="rated-message"></h6>
                          </div>
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
                            <h3>Film simili da scoprire:</h3>
                        </div>
                        <?php $max_loop = 6; 
                        $count = 0; ?>
                    @foreach($similar_obj->results as $similar_movie)
                      <div class="col-md-7 col-lg-2">
                            <a href="{{ $similar_movie->id }}">
                            @if($similar_movie->poster_path != '')
                            <img class="img-poster" src="https://image.tmdb.org/t/p/w154{{$similar_movie->poster_path }}">
                            @endif
                         <p class="title-movie">{{$similar_movie->title }}</p>
                        </a>
                      </div>
                      <?php
                      $count++;
                      if($count == $max_loop){ break; } ?> 
                    @endforeach
                </div>
             </div>
         </section>
         @endif
         <!--Fine film simili-->

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
@endsection