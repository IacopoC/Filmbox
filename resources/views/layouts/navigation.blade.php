
<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">Film box</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="{{ setActive('trending', 'active') }} nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/trending') }}">Di tendenza</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="{{ setActive('upcoming', 'active') }} nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/upcoming') }}">In arrivo</a>
                </li>
                @guest
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="{{ setActive('login', 'active') }} nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="{{ setActive('register', 'active') }} nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/register') }}">Register</a>
                </li>
                @else
                    <li class="dropdown">
                        <img class="nav-proimg" src="{{ 'https://www.gravatar.com/avatar/' . gravatar_img(Auth::user()->email) }} . '?s=25'">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/account') }}">Account</a>
                            </li>
                            <li>
                                <a href="{{ url('/profile') }}">Profilo</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout <i class="fa fa-sign-out"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

