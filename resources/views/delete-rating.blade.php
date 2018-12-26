@extends('layout')
@section('title')
    Cancella votazione
@endsection
@section('content')
    <section>
    <div class="container">
        <div class="margin-up">
            <h4 class="text-uppercase">La votazione è stata cancellata</h4>
            <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $rating_request->status_message }}</div>
                <p>Grazie</p>
                <div class="panel-body">
                    <a href="{{ url('/account') }}"><button type="button" class="btn btn-info">Torna all' account</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </section>
@endsection