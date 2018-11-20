@extends('layout')
@section('title')
    Generazione token votazione
@endsection
@section('content')
    <section>
    <div class="container">
        <div class="margin-up">
            <h4 class="text-uppercase">Token Votazione film e materiali</h4>
            <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generato token ospite</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Grazie
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </section>
@endsection