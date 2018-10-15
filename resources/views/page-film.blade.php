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
                        <img src="https://image.tmdb.org/t/p/w400{{$film_obj->poster_path }}">
                        </div>
                        <div class="col-md-6">
                            <h3>Trama</h3>
                            <p>{{ $film_obj->overview }}</p>

                            <?php foreach ($film_obj->genres as $film_genre):
                            $result_genre[] = $film_genre->name;
                            endforeach; ?>

                <p><strong>Genere:</strong> {{ implode(", ",$result_genre) }} </p>
                    <p><strong>Voto medio:</strong> {{ $film_obj->vote_average }}</p>
                        <?php if (Auth::check()): ?>
                            <form method="POST" action="/page-film">
                                 <fieldset>
                            <span class="star-cb-group">

                            <?php for ($i = 1; $i <=10; $i++) {
                                ?>
                                <input type="radio" id="rating-<?php echo $i ?>" name="rating" value="<?php echo $i;?>" /><label for="rating-10"><?php echo $i;?></label>
                            <?php } ?>

                            </span>
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
@endsection