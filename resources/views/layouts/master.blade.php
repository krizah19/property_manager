<!-- Master Layout for project -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS for project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.min.css') }}" >

</head>

<body class="">
  <div class="wrapper ">
    
  <div class="sidebar" data-color="green"> <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
      <div class="logo">
        <a href="/dashboard" class="simple-text logo-mini">
        RMS
        </a>
        <a href="/dashboard" class="simple-text logo-normal">
        Green City
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ 'dashboard' == request()->path() ? 'active' : '' }}">
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ 'tenant-register' == request()->path() ? 'active' : '' }}">
            <a href="/tenant-register">
              <i class="now-ui-icons users_single-02"></i>
              <p>Applicants and Tenants</p>
            </a>
          </li>
          <li class="{{ 'lease-register' == request()->path() ? 'active' : '' }}">
            <a href="/lease-register">
              <i class="now-ui-icons files_paper"></i>
              <p>Applications/Leases</p>
            </a>
          </li>
          <li class="{{ 'landlord-register' == request()->path() ? 'active' : '' }}">
            <a href="./landlord-register">
              <i class="now-ui-icons users_single-02"></i>
              <p>Landlords</p>
            </a>
          </li>
          <li class="{{ 'property-register' == request()->path() ? 'active' : '' }}">
            <a href="/property-register">
              <i class="now-ui-icons travel_istanbul"></i>
              <p>Properties</p>
            </a>
          </li>
          <li class="{{ 'unit-register' == request()->path() ? 'active' : '' }}">
            <a href="/unit-register">
              <i class="now-ui-icons shopping_shop"></i>
              <p>Units</p>
            </a>
          </li>
          <li class="{{ 'payment-register' == request()->path() ? 'active' : '' }}">
            <a href="/payment-register">
              <i class="now-ui-icons business_money-coins"></i>
              <p>Payments</p>
            </a>
          <li class="{{ 'role-register' == request()->path() ? 'active' : '' }}">
            <a href="/role-register">
              <i class="now-ui-icons users_circle-08"></i>
              <p>System Users</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="/terms-conditons">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Terms & Conditions</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Green City Real Estate Management System Portal</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                 
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                                    {{ Auth::user()->name }}
                              
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

       <div class="panel-header panel-header-sm">
      </div>
      <div class="content">

            @yield('content')
        

      </div>



      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.facebookcom">
                  Facebook
                </a>
              </li>
              <li>
                <a href="http://youtube.com">
                  YouTube
                </a>
              </li>
              <li>
                <a href="http://instagram.com">
                  Instagram
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.chrisoft-team.com" target="_blank">Chrispin</a>. Coded by <a href="https://www.chrisoft-team.com" target="_blank">Chrisoft Team</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>

  <script src="{{ asset('assets/js/dataTables.min.js') }}"></script>

  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

@yield('scripts')

</body>

</html>