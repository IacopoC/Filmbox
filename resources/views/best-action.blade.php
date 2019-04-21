@extends('layout')

@section('title')
    Migliori film di azione - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h2>Migliori film di azione</h2>
               <div class="padding-updown"></div>
                <div class="row">
                    @foreach ($action_obj->results as $action_movie)
                        <div class="col-md-7 col-lg-3">
                            <div class="film-box">
                            <a href="page-film/{{ $action_movie->id }}">
                                <img class="img-poster" src="https://image.tmdb.org/t/p/w200{{$action_movie->poster_path }}">
                                <h6 class="title-movie">{{ $action_movie->title }}</h6>
                            </a>
                            </div>
                        </div>
                    @endforeach
                        <div class="col-lg-12">
                            <div class="button-box">
                                <button class="btn-secondary btn-more-results-action">Mostra più risultati  <i class="fa fa-fw fa-chevron-down"></i></button>
                            </div>
                            <div class="row more-results">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts/search-modal')
    <script>
        $(document).ready(function() {

            let api_key = "2daef69f5e47a9f774cd8db16ffba569";

            $(".btn-more-results-action").click(function () {
                $(this).hide();

                $.ajax({
                    url: `https://api.themoviedb.org/3/discover/movie?api_key=${api_key}&with_genres=28&sort_by=vote_average.desc&vote_count.gte=10&page=2`,
                    dataType: 'json',
                    success: function (result) {
                        "use strict";
                        $.each(result.results, function (index, value) {
                            let image = `<img class=\"img-poster\" src=\"https://image.tmdb.org/t/p/w200${value['poster_path']}"/>`;
                            let title = `<h6 class=\"title-movie\"><strong>${value['title']}</strong></h6>`;

                            jQuery(".more-results").append(`<div class=\"col-md-7 col-lg-3 text-center\"><a href='page-film/${value['id']}'>${image}${title}</a></div>`);
                        })
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });

            });
        });
    </script>
@endsection