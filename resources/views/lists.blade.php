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
                        <p>{{ $list->description }}</p>
                            <form id="list-form" method="POST" action="{{ action('ListsController@deleteLists') }}" onsubmit="return confirm('Cancellando una lista eliminerai il suo contenuto.');">
                                {{ csrf_field() }}
                                <input type="hidden" name="lists_id" id="list-id" value="{{ $list->id }}">
                                <button type="submit" class="btn-warning">Delete</button>
                            </form>

                        @if(!empty($films))

                        @foreach($films as $film)
                        @if( $list->id === $film->lists_id )
                            <div class="list-film">
                             <a class="d-inline" href="page-film/{{ $film->content }}"> {{ $film->content_name }}</a>
                                  <form id="film-form" class="d-inline" method="POST">
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
    <script>
        $(document).ready(function() {
            $( "#film-submit" ).click(function(event) {

                event.preventDefault();
                let film_id = $('#film-id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    data: {
                        "film_id": film_id,
                        "_token": '{{ csrf_token() }}'
                    },

                    success: function(result) {
                        $('div.list-film').addClass('.d-none');
                    },
                    error: function (request) {
                        console.log("Request: " + JSON.stringify(request));
                    }
                })
            })
        });
    </script>
@endsection