@inject('countries', 'App\Http\Utilities\Country')

@extends('layout')

@section('title')
    Profilo {{ $user->name }} - FilmBox
@endsection
@section('content')
 <section>
    <div class="container">
        <div class="margin-up">
            <div class="row">
        <div class="col-md-6">
            <div class="image-avatar">
                <img class="img-profile" src="{{ 'https://www.gravatar.com/avatar/' . gravatar_img($user->email) }} . '?s=200'">
            </div> 
            <div class="margin-up">
            <p>Vuoi cambiare l'immagine del profilo? La prendiamo da <a href="https://www.gravatar.com" target="_blank">gravatar.com</a></p>
          </div>
        </div>
        <div class="col-md-6">
            <h4 class="text-uppercase auth-title">Profilo {{ $user->name }}</h4>
            <div class="margin-up"></div>
                <p><strong>Email:</strong> {{ $user->email }} </p>
                <p>@if(!empty($user->guest_session_tk))
                        <strong>Token TMDB:</strong> {{ $user->guest_session_tk }} @endif <button onClick="confirmFunction()" class="btn btn-warning float-right" alt="rigenera-token">Genera Token</button></p>
            <p><strong>Iscritto dal:</strong> {{ date('d M Y', $user->created_at->timestamp) }}</p>

             @if(!empty($user->country))
            <p><strong>Provenienza:</strong> {{ $user->country }},
            @endif
            @if(!empty($user->hometown))
            {{ $user->hometown }}</p>
            @endif
       
            @if(!empty($user->twitter_username))
            <div class="social-box">
                <a href="https://twitter.com/{{ $user->twitter_username }}" target="_blank"><i class="fa fa-fw fa-twitter"></i></a>
            </div>
            @endif
            @if(!empty($user->instagram_username))
            <div class="social-box">
                <a href="https://instagram.com/{{ $user->instagram_username }}" target="_blank"><i class="fa fa-fw fa-instagram"></i></a>
            </div>
            @endif
            @if(!empty($user->facebook_username))
                <div class="social-box">
                    <a href="https://facebook.com/{{ $user->facebook_username }}" target="_blank"><i class="fa fa-fw fa-facebook"></i></a>
                </div>
            @endif
               <div class="panel panel-primary">
                
                    @if(!empty($rated_movies->results))
                    <div class="panel-heading"><h4>Il film che hai votato</h4></div>
                    <div class="panel-body">
                        @foreach($rated_movies->results as $rated_movie)
                        <p>{{ $rated_movie->title }} | Voto: {{ $rated_movie->rating }}</p>
                        @endforeach
                     </div>
                    @endif        
        </div>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-info">Modifica profilo</button>
            <div class="mt-2 mb-2">
        <form id="userdelete-form" method="POST" action="{{ url('/delete-user') }}" onsubmit="return confirm('Cancellando il profilo perderai tutto il suo contenuto');">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Cancella Profilo</button>
        </form>
            </div>
        </div>
    </div>
</div>
    </div>
    </section>
 @include('layouts/search-modal')
    <!-- Finestra modale profilo -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header card-header-title">
        <h4 class="modal-title card-element-title">Aggiungi informazioni profilo</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                       
                          <div class="form-group">
                            <label for="site_url" class="col-md-4 control-label-p">Città</label>

                            <div class="col-md-9">
                              <div class="input-group">
                              <span class="input-group-addon" id="basic-addon3"></span>
                                <input id="hometown" type="text" class="form-control" name="hometown" value="@if(!empty($user->hometown)){{ $user->hometown }} @endif" autofocus>
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="job_title" class="col-md-4 control-label-p">Stato</label>

                            <div class="col-md-9">
                                <select id="country" class="form-control" name="country">

                                  <!--Uso blade inject come sopra per classe Country-->
                                @foreach( $countries::all() as $country => $code) 
                                <option <?php if (isset($user->country) && $user->country == $code): echo "selected"; endif;?> value="{{ $code }}">{{ $country }}</option>
                                @endforeach
                                 </select>
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="twitter_username" class="col-md-4 control-label-p">Twitter username</label>
                            <div class="col-md-9">
                                <input id="social-tw" type="text" class="form-control" name="twitter_username" value="@if(!empty($user->twitter_username)){{ $user->twitter_username }} @endif">
                              </div>
                        </div>

                           <div class="form-group">
                            <label for="instagram_username" class="col-md-6 control-label-p">Instagram username</label>
                            <div class="col-md-9">
                                <input id="social-ig" type="text" class="form-control" name="instagram_username" value="@if(!empty($user->instagram_username)){{ $user->instagram_username }} @endif">
                              </div>
                        </div>

                            <div class="form-group">
                            <label for="facebook_username" class="col-md-6 control-label-p">Facebook username</label>
                            <div class="col-md-9">
                            <input id="social-fb" type="text" class="form-control" name="facebook_username" value="@if(!empty($user->facebook_username)){{ $user->facebook_username }} @endif">
                            </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Aggiorna profilo
                                </button>
                            </div>
                        </div>
                    </form>
      </div>
    </div>
  </div>
</div>
<!-- Fine finestra modale -->
<script>
  function confirmFunction() {
    if(confirm("Cliccando Ok, perderai i film e i materiali che hai votato e genererai un nuovo token")== true ) {
      window.location.href = "/tk-generation"
}
  }
</script>
@endsection