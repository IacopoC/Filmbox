@extends('layout')

@section('content')
    <section>
    <div class="container">
        <div class="margin-up">
            <h4 class="text-uppercase">Logged in</h4>
            <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!

                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </section>
@endsection
