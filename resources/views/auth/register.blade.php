@extends('layout')

@section('content')
    <section>
<div class="container">
    <div class="margin-up">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <h4 class="text-uppercase auth-title">Registra un nuovo account</h4>
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body mt-4">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                          
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                           
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                          
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Conferma Password</label>

                           
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                         
                        </div>

                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-primary">
                                    Invia
                                </button>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{asset('images/filmbox-registrati.jpg')}}" class="img-fluid mt-5">
        </div>
    </div>
</div>
</div>
    </section>
    @include('layouts/search-modal')
@endsection
