<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashbord</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet"  href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <link rel="stylesheet"  href="{{asset('vendor/bootstrap/css/bootstrap.min.css.map')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/glyphicons.css')}}" rel="stylesheet">
</head>

<body>

    <div id="wrapper" >
         <nav class="navbar navbar-expand-lg   fixed-top">
            <div class="container">
              
                <a  href="#menu-toggle" id="menu-toggle" class="glyphicon glyphicon-heart" ><i class="fas fa-bars"></i> </i></a>
                
                <a class="navbar-brand" href="/admin"> Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                   
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                {{Auth::user()->getNames()}}<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInUp">
                                <li><a href="/">Front End</a></li>
                                <li> <a href="{{ route('logout') }}">Logout
                               </a></li>
                            </ul>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="padding-top: 20">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                </li>
                <li class="dropdown">
                <h1>DashBoard </h1>
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
                <ul class="dropdown-menu animated fadeInUp">
                <li><a href="/admin">All Products</a></li>
                    <li><a href="{{route('product.create')}}">Add Products</a></li>
                </ul>
                <li>
                    <a href="{{url('admin/category')}}">Categories</a>
                </li>
                <li>
                    <a href="{{url('admin/orders')}}">Orders</a>
                </li>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <div class="container-fluid"">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

   
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#wrapper").toggleClass("toggled");
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

@yield('script')
</body>

</html>
