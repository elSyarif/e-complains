<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <!-- Toggles CSS -->
  <link href="{{ asset('theme') }}/vendors4/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('theme') }}/vendors4/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet"
    type="text/css">
  <!-- Font Awesome -->
  <link href="{{ asset('/theme/dist/fonts/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- ION CSS -->
  <link href="{{ asset('theme') }}/vendors4/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('theme') }}/vendors4/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css" rel="stylesheet"
    type="text/css">

  @stack('css')
  <!-- Custom CSS -->
  <link href="{{ asset('theme') }}/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <!-- Preloader -->
  <div class="preloader-it">
    <div class="loader-pendulums"></div>
  </div>
  <!-- /Preloader -->

  <!-- HK Wrapper -->
  <div class="hk-wrapper hk-horizontal-nav">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
      <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span
          class="feather-icon"><i data-feather="menu"></i></span></a>
      <a class="navbar-brand" href="{{ url('/home') }}">
        <h3 style="color: white">{{ config('app.name') }}</h3>
        {{-- <img class="brand-img d-inline-block" src="{{ asset('theme') }}/dist/img/logo-light.png"
        alt="brand" /> --}}
      </a>
      <ul class="navbar-nav hk-navbar-content">
        <li class="nav-item dropdown dropdown-notifications">
          <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i
                data-feather="bell"></i></span><span class="badge-wrap">

              {{--  indikator ada pesan baru  --}}
            </span></a>
          <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">View all</a>
            </h6>
            <div class="notifications-nicescroll-bar" id="notif-bar">
              <div id="notif-bar2">

              </div>
              <div id="notif-bar3">

              </div>
              <div id="notif-bar4">

              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown dropdown-authentication">
          <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <div class="media">
              <div class="media-img-wrap">
                <div class="avatar">
                  <img src="{{ asset('storage/') }}{{ Auth::user()->avatar }}" alt="user"
                    class="avatar-img rounded-circle">
                </div>
                <span class="badge badge-success badge-indicator"></span>
              </div>
              <div class="media-body">
                <span>{{ Auth::user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
            <a class="dropdown-item keluar" href="{{ route('profile') }}"><i
                class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
            <div class="dropdown-divider garis"></div>
            <a class="dropdown-item keluar" href="{{ route('logout') }}"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                class="dropdown-icon zmdi zmdi-power"></i><span> {{ __('Logout') }}</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /Top Navbar -->
    @include('layouts._navbar')


    <!-- Main Content -->
    <div class="hk-pg-wrapper">

      <!-- Container -->
      <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
        <!-- Row -->
        {{-- <div class="hk-row"> --}}
        @yield('content')
        {{-- </div> --}}

        <!-- /Row -->
      </div>
      <!-- /Container -->
      @include('layouts._modal')
      <!-- Footer -->
      <div class="hk-footer-wrap container-fluids">
        @include('layouts._footer')
      </div>
      <!-- /Footer -->
    </div>
    <!-- /Main Content -->

  </div>
  <!-- /HK Wrapper -->
  <!-- jQuery -->
  <script src="{{ asset('theme') }}/vendors4/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('theme') }}/vendors4/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Jasny-bootstrap  JavaScript -->
  <script src="{{ asset('theme') }}/vendors4/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

  <!-- Slimscroll JavaScript -->
  <script src="{{ asset('theme') }}/dist/js/jquery.slimscroll.js"></script>

  <!-- Fancy Dropdown JS -->
  <script src="{{ asset('theme') }}/dist/js/dropdown-bootstrap-extended.js"></script>

  <!-- Ion JavaScript -->
  <script src="{{ asset('theme') }}/vendors4/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
  <script src="{{ asset('theme') }}/dist/js/rangeslider-data.js"></script>

  <!-- Toggles JavaScript -->
  <script src="{{ asset('theme') }}/vendors4/jquery-toggles/toggles.min.js"></script>
  <script src="{{ asset('theme') }}/dist/js/toggle-data.js"></script>

  <!-- Bootstrap Input spinner JavaScript -->
  <script src="{{ asset('theme') }}/vendors4/bootstrap-input-spinner/src/bootstrap-input-spinner.js"></script>
  <script src="{{ asset('theme') }}/dist/js/inputspinner-data.js"></script>
  <script src="{{ asset('/theme/dist/fonts/fontawesome/js/all.min.js') }}"></script>

  @stack('scripts')

  <!-- FeatherIcons JavaScript -->
  <script src="{{ asset('theme') }}/dist/js/feather.min.js"></script>

  <!-- Init JavaScript -->
  <script src="{{ asset('theme') }}/dist/js/init.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
