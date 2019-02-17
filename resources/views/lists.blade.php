@extends('layout')

@section('title')
    Liste - FilmBox
@endsection
@section('content')
<section>
    <div class="container">
        <div class="margin-up">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase auth-title">Liste create da {{ Auth::user()->name }}</h4>
                    @foreach( $all_lists as $list)
                        <div class="bg-light mt-md-5 p-3">
                        <h4>{{ $list->name }}</h4>
                        <p> {{ $list->description }}</p>
                        @if(!empty($films))


                        @foreach($films as $film)
                        @if( $list->id === $film->lists_id )
                            <div class="list-film">
                             <a class="d-inline" href="page-film/{{ $film->content }}"> {{ $film->content_name }}</a>
                                  <form id="film-form" class="d-inline" method="POST" action="{{ action('ListsController@deleteMovie') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="film_id" id="film-id" value="{{ $film->id }}">
                                      <button type="submit" id="film-submit" class="btn-light"><i class="fa fa-times" aria-hidden="true"></i></button>
                                  </form>
                            </div>
                            @endif
                                @endforeach


                            @endif
                        </div>
                        @endforeach
                        <div class="mt-md-5">
                            @include('layouts/create-list-btn')
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection