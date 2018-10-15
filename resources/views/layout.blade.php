<!DOCTYPE html>
<html lang="en">

  @include('layouts.header')

  <body>

	@include('layouts.navigation')
    <div>

      <div>
      
	@yield('content')
     
      </div>

   
    </div><!-- /.container -->
    @include('layouts.footer')
    @include('layouts.scripts')
  </body>
  

</html>
