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
                            <p><a href="page-film/{{ $film->content }}"> {{ $film->content_name }}</a></p>
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