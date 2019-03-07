
<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">About FilmBox</h4>
                <p class="lead mb-0">FilmBox ti permette di cercare film e serie TV, votare e salvare
                    i tuoi film preferiti.</p>
            </div>
            <div class="col-md-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Menu</h4>
                <p class="lead mb-0"><a href="{{ url('/trending') }}">Di tendenza</a></p>
                 <p class="lead mb-0"><a href="{{ url('/upcoming') }}">In arrivo</a></p>
                 <p class="lead mb-0"><a href="{{ url('/login') }}">Login</a></p>
                  <p class="lead mb-0"><a href="{{ url('/register') }}">Register</a></p>
            </div>
            <div class="col-md-4">
                <h4 class="text-uppercase mb-4">Credits</h4>
                <p class="lead mb-0">FilmBox è realizzata ma non supportata da <a href="http://themoviedb.org" target="_blank">TMDB</a>.</p>
                <div class="social pt-3">
                <li class="list-inline-item">
                    <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.facebook.com/sharer/sharer.php?u=#">
                        <i class="fa fa-fw fa-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://twitter.com/share?text=Scopri FilmBox, per cercare e salvare i tuoi film preferiti&url=https://filmbox.it&hashtags=filmbox">
                        <i class="fa fa-fw fa-twitter"></i>
                    </a>
                </li>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright py-4 text-center text-white">
    <div class="container">
        <small>&copy; Film Box {{ date('Y') }} - <a href="{{ url('/privacy-cookie') }}">Privacy Policy e Cookie Policy</a> | <a href="https://iacopocutino.it" target="_blank">Credits</a> </small>
    </div>
</div>
@include('cookieConsent::index')

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

