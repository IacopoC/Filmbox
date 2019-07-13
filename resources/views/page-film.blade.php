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
                        
                        <div class="col-md-6 mt-4">
                            @if($film_obj->poster_path !='')
                        <img class="img-poster img-fluid" src="https://image.tmdb.org/t/p/w400{{$film_obj->poster_path }}">
                            @endif

                        </div>
                     <div class="col-md-6 mt-4">
                         <h3>Trama</h3>
                         @if($film_obj->overview !='')
                             <p>{{ $film_obj->overview }}</p>
                         @else
                             <p>La trama non è disponibile</p>
                         @endif
                         <?php foreach ($film_obj->genres as $film_genre):
                             $result_genre[] = $film_genre->name;
                         endforeach; ?>

                     <!--Inizio sezione cast-->
                         @foreach($credits_obj->cast as $credits_people)
                             <?php $credits_arr[] = $credits_people->character . " (" . $credits_people->name . ")"; ?>
                         @endforeach
                         <div class="card">
                             <div class="card-header" id="headingOne">
                                 <h5 class="mb-0">
                                     <button class="btn btn-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                         <strong>Cast</strong>
                                     </button>
                                 </h5>
                             </div>

                             <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                 <div class="card-body">
                                     <p>{{ implode(", ",$credits_arr) }}</p>
                                 </div>
                             </div>
                         </div>
                         <!--Fine sezione cast-->

                         @if(isset($result_genre))
                             <p class="mt-4 mb-4"><strong>Genere:</strong> {{ implode(", ",$result_genre) }} </p>
                         @endif
                         @if(!empty($trailer_obj->results))
                             <p class="mt-4 mb-4"><strong>Trailer disponibili:</strong>
                                 <?php $i = 0; ?>
                                 @foreach($trailer_obj->results as $trailer_content)
                                     <?php $i++; ?>
                                     <a href="https://www.youtube.com/watch?v={{ $trailer_content->key }}" target="_blank">Trailer {{ $i }} <i class="fa fa-fw fa-external-link"></i></a>
                                 @endforeach
                             </p>
                         @endif

                         @foreach($dates_obj->results as $dt)
                             @if($dt->iso_3166_1 == 'IT')
                                 <?php $date = strtotime($dt->release_dates[0]->release_date);
                                 $date_converted = date('d-m-Y', $date); ?>
                                 <p class="mt-4 mb-4"><strong>Data di uscita in Italia:</strong> {{ $date_converted }} </p>
                             @endif
                         @endforeach

                         <div class="votes-box">
                             <p class="d-inline"><strong>Voto medio:</strong> {{ $film_obj->vote_average }}
                                 @if($film_obj->vote_average == 0) <button type="button" class="btn btn-secondary ml-2">Non disponibile</button>
                                 @elseif($film_obj->vote_average > 0.0 && $film_obj->vote_average < 6.0 ) <button type="button" class="btn btn-danger ml-2">Da evitare</button>
                                 @elseif($film_obj->vote_average >= 6.0 && $film_obj->vote_average < 8.0) <button type="button" class="btn btn-secondary ml-2">Sufficiente</button>
                                 @elseif($film_obj->vote_average >= 8 && $film_obj->vote_average < 10.0) <button type="button" class="btn btn-primary ml-2">Buono</button>
                                 @else <button type="button" class="btn btn-success ml-2">Ottimo</button> @endif</p>
                         </div>

                         <?php if (Auth::check()): ?>
                         <div class="votes-box">
                             <form  name="movie-rating" id="rating-form">
                                 {{ csrf_field() }}
                                 <fieldset>
                                     <p><strong>Vota il film</strong></p>
                                     <div class="rating-fields">
                            <span class="star-cb-group">
                              <label for="vote-4">Da evitare
                                  <input type="radio" id="rating-id-4" name="rating" value="4" /></label>

                                <label for="vote-6" class="px-2">Sufficiente
                                <input type="radio" id="rating-id-6" name="rating" value="6" /></label>

                                <label for="vote-8" class="px-2">Buono
                                <input type="radio" id="rating-id-8" name="rating" value="8" /></label>

                                <label for="vote-10" class="px-2">Ottimo
                                <input type="radio" id="rating-id-10" name="rating" value="10" /></label>
                            </span>
                                     </div>
                                     <input id="movieId" name="movie-id" type="hidden" value="{{ $id }}">
                                 </fieldset>
                                 <button type="submit" class="btn btn-primary">
                                     Vota
                                 </button>
                             </form>
                         </div>
                             <h6 id="rated-message"></h6>
                         <?php endif; ?>
                     </div>
                     <div class="col-md-6"></div>
                     <div class="col-md-6">
                         <!--Sezione pulsanti liste-->
                         @if (Auth::check())
                             <div class="create-list-btn mb-md-2">
                                 <div class="row">
                                     <div class="col-md-12">
                                         <p><strong>Crea o scegli liste</strong></p>
                                     </div>
                                     <div class="col-md-12">
                                         <form id="insert-list" name="list-insert">
                                             {{ csrf_field() }}
                                             <div class="form-group">
                                                 <select class="form-control" id="list-select" name="list_select">
                                                     <option>Scegli una lista</option>
                                                     @foreach($lists as $list)
                                                         <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                             <div class="form-group">
                                                 <input type="hidden" name="film_name" id="film-name" value="{{ $film_obj->title }}">
                                             </div>
                                             <div class="form-group">
                                                 <input type="hidden" name="film_id" id="film-id" value="{{ $id }}">
                                             </div>
                                             <div class="form-group">
                                                 <input type="submit" class="btn btn-primary" id="lista-film-submit" value="Aggiungi film">
                                             </div>
                                         </form>
                                     </div>
                                     <div class="col-md-8">
                                         @include('layouts/create-list-btn')

                                         <div class="mt-4">
                                             <h6 id="list-message"></h6>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                     @endif
                     <!--Fine sezione pulsanti liste-->
                     </div>

                       </div>
                    </div>

    <!--Sezione critica-->
    @if(!empty($reviews_obj->results))

            <div class="row">
              <div class="col-md-12">
                  @foreach( $reviews_obj->results as $review_ob )
                  <div class="card mt-3">
                      <div class="card-header" id="headingTwo">
                          <h5 class="mb-0">
                              <button class="btn btn-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                  <strong>Critica</strong>
                              </button>
                          </h5>
                      </div>

                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body">
                              <p><strong>{{ ($film_obj->title) }} - Recensione di {{ $review_ob->author }}</strong></p>
                              <p>{{ $review_ob->content }}</p>
                              <p><a href="{{ $review_ob->url }}" target="_blank">Link scheda critica <i class="fa fa-arrow-right"></i></a></p>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
            </div>
        </div>
    </section>
    @endif
        <!--Fine sezione critica-->
        <!-- Sezione film simili -->

        @if(!empty($similar_obj->results))
        <section>
        <div class="container">
                 <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3>Film simili da scoprire:</h3>
                        </div>
                    @foreach($similar_obj->results as $similar_movie)
                      <div class="col-md-7 col-lg-2">
                          <div class="film-box">
                            <a href="{{ $similar_movie->id }}">
                            @if($similar_movie->poster_path != '')
                            <img class="img-poster" src="https://image.tmdb.org/t/p/w154{{$similar_movie->poster_path }}">
                            @endif
                         <p class="title-movie font-weight-bold">{{$similar_movie->title }}</p>
                        </a>
                          </div>
                      </div>
                    @endforeach
                </div>
             </div>
         </section>
         @endif
    @include('layouts/search-modal')
         <!--Fine film simili-->
    @if (Auth::check())
         <script>
        
    document.getElementById('rating-form').addEventListener('submit',getRating);

    function getRating(e) {
        e.preventDefault();

        let name = document.querySelector('input[name="rating"]:checked').value;
        let param = JSON.stringify({ "value": name });
        const api_key = '{{ env('MOVIE_DATABASE_KEY') }}';
        let movie_id = '{{ $film_obj->id }}';
        let guest_session_tk = '{{ $guest_tk }}';

        let xhr = new XMLHttpRequest();

        let url = `https://api.themoviedb.org/3/movie/${movie_id}/rating?api_key=${api_key}&guest_session_id=${guest_session_tk}`;
      
        xhr.open('POST', url , true);
        xhr.setRequestHeader('Content-type','application/json;charset=utf-8');
        xhr.onreadystatechange = function () {
            if (xhr.status == 200) {
                 console.log(xhr.responseText);    
            }
        }
        document.getElementById('rated-message').innerHTML = `Grazie per aver votato <a href="{{ url('account') }}">Elenco film votati <i class="fa fa-arrow-right"></i></a>`;
        xhr.send(param);
    }

    $(document).ready(function() {

        $( "#lista-film-submit" ).click(function(event) {

            event.preventDefault();
            let film_id = $('#film-id').val();
            let film_name = $('#film-name').val();
            let list_id = $('#list-select').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                data: {
                    "film_id": film_id,
                    "film_name": film_name,
                    "list_select": list_id,
                    "_token": '{{ csrf_token() }}'
                },

                success: function(result){
                    $('#list-message').html(`Film aggiunto alla lista <a href="{{ url('lists') }}">Elenco liste <i class="fa fa-arrow-right"></a>${result}`);
                },

                error: function (request) {
                    console.log("Request: " + JSON.stringify(request));
                }
            })
        })
    });
         </script>
    @endif
@endsection