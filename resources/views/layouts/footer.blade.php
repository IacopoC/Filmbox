
<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Menu</h4>
                <p class="lead mb-0"><a href="{{ url('/trending') }}">Di tendenza</a></p>
                 <p class="lead mb-0"><a href="{{ url('/upcoming') }}">In arrivo</a></p>
                 <p class="lead mb-0"><a href="{{ url('/login') }}">Login</a></p>
                  <p class="lead mb-0"><a href="{{ url('/register') }}">Register</a></p>
            </div>
            <div class="col-md-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Generi</h4>
                <p class="lead mb-0"><a href="{{ url('/best-adventure') }}">Avventura</a></p>
                <p class="lead mb-0"><a href="{{ url('/best-scifi') }}">Fantascienza</a></p>
                <p class="lead mb-0"><a href="{{ url('/best-action') }}">Azione</a></p>
                <p class="lead mb-0"><a href="{{ url('/best-horror') }}">Horror</a></p>
            </div>
            <div class="col-md-4">
                <h4 class="text-uppercase mb-4">About Film BOX</h4>
                <p class="lead mb-0">Film Box è realizzata ma non supportata da <a href="http://themoviedb.org" target="_blank">TMDB</a>. Un archivio
                    dove trovare i tuoi film preferiti</p>
                <div class="social pt-3">
                <li class="list-inline-item">
                    <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                        <i class="fa fa-fw fa-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                        <i class="fa fa-fw fa-instagram"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
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
        <small>&copy; Film Box {{ date('Y') }} - <a href="#">Privacy Policy</a> | <a href="#">Credits</a> </small>
    </div>
</div>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

