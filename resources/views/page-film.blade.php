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
@endsection