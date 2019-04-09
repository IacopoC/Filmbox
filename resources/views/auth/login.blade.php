@extends('layout')

@section('content')
    <section>
<div class="container">
    <div class="margin-up">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <h4 class="text-uppercase auth-title">Login</h4>
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body mt-4">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                          
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Memorizza accesso
                                    </label>
                                </div>
                        </div>

                        <div class="form-group"> 
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Password dimenticata?
                                </a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{asset('images/filmbox-login.jpg')}}" class="img-fluid mt-5">
        </div>
    </div>
    </div>
</div>
    </section>
    @include('layouts/search-modal')
@endsection
