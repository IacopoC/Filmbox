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
                    <h4 class="text-uppercase auth-title">Liste create da utente</h4>

                    @foreach( $all_lists as $list)
                        <p>{{ $list->name }}</p>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection