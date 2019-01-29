
@extends('layout')

@section('title')
    Crea lista - FilmBox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-uppercase auth-title">Crea una lista</h4>
                        <div class="margin-up"></div>
                        <form class="form-horizontal" method="POST" action="{{ action('ListsController@createLists') }}" id="list-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-md-6 control-label">Nome lista</label>
                                    <input id="name-field" type="text" class="form-control" name="name-field" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-6 control-label">Descrizione lista</label>
                                    <input id="description-field" type="text" class="form-control" name="description-field" required>
                            </div>
                            <input id="user-field" type="hidden" name="user-id" value="{{ $user_id }}">

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Crea lista">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection