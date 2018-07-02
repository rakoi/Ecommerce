<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title','Anvil.com')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet"  href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet"  href="{{asset('vendor/bootstrap/css/bootstrap.min.css.map')}}">
    <!-- Custom styles for this template -->
    
    <link rel="stylesheet"  href="{{asset('css/shop-homepage.css')}}">
     <link rel="stylesheet"  href="{{asset('css/custom.css')}}">
   
   <script type="text/javascript" src="{{asset('js/my.js')}}"></script>
<script src="https://js.stripe.com/v3/"></script>

      </head>




  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Anvil</a>
              <form class="pull-right" method="POST">

                <input type="text" name="search" placeholder="search">
                <Button type="submit" class="btn btn-info">Search
                <span class="fa fa-address-book"></span></Button>
              </form>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('contact')}}">Need Help ?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('cart.index')}}">Shopping Bag   <span class="badge badge-danger"> {{Cart::count()}}</span></a>
            </li>
          </ul>
        </div>
        <div>
                    <ul class="navbar-nav ml-auto">
                        <li></li>
                        <li class="dropdown pull-right">
                            @if(Auth::user())
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                                {{Auth::user()->getNames()}}<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInUp">
                             
                                <li> <a href="{{ route('logout') }}">Logout
                               </a></li>
                            </ul>
                            </a>
                          @endif  
                        </li>
                        
                    </ul>
               
      </div>

    </nav>

    <!-- Page Content -->
    @yield('pagecontent')

    <!-- Footer -->
    @yield('footer')
    <footer class="py-5 bg-dark  "  >
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Anvil's <br> <a href="">Terms and Conditions</a></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    
    <script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 
  </body>

</html>
