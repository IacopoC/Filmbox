@extends('layout')
@section('title')
    Nuovo token - Filmbox
@endsection
@section('content')
    <section>
    <div class="container">
        <div class="margin-up">
            <h4 class="text-uppercase">Nuovo token generato</h4>
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
                    <p>Verrete reindirizzati alla pagina profilo, se ciò non dovesse accadere cliccate sul link di seguito.</p>

                </div>
                <a href="{{ url('/profile') }}"><button type="button" class="btn btn-info">Vai al profilo</button></a>
            </div>
        </div>
    </div>
</div>
    </div>
    </section>
    <script>
        setTimeout(function() {window.location.href = '{{ url('/profile') }}';},3000);
    </script>
@endsection