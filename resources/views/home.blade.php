@extends('layout')

@section('content')
    <section>
    <div class="container">
        <div class="margin-up">
            <h4 class="text-uppercase">Sei loggato</h4>
            <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Benvenuto nell'area riservata di Film Box!</p>
                        <a href="{{ url('/profile') }}"><button type="button" class="btn btn-info">Vai al profilo</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </section>
@endsection
