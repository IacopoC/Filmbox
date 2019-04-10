@extends('layout')

@section('title')
    Lista eliminata - Filmbox
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="margin-up">
                <h4 class="text-uppercase"></h4>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"></div>

                            <div class="panel-body">
                                <h3>Hai eliminato una lista</h3>
                                <a href="{{ url('/lists') }}"><button type="button" class="btn btn-info">Torna all'elenco liste</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection