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

                            <p><strong>Genere:</strong> {{ implode(",",$result_genre) }} </p>
                            <p><strong>Voto medio:</strong> {{ $film_obj->vote_average }}</p>
                        </div>

                 </div>
             </div>
        </div>
    </section>
@endsection