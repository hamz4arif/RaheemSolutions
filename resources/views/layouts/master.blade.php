<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
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
  @yield('style')
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->


  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <style>
    .bootstrap-select>.dropdown-toggle.bs-placeholder {
      color: #2c2c2c !important;
    }

    .btn.dropdown-toggle.btn-light,
    .btn.dropdown-toggle.btn-light:hover,
    .btn.dropdown-toggle.btn-light:active {
      background-color: transparent;
      border: 1px solid #E3E3E3;
      border-radius: 30px;
      color: #2c2c2c;
      line-height: normal;
      height: auto;
      font-size: 0.8571em;
      margin-top: 0px;
    }
  </style>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="">
  <?php
  $company = App\Models\Company::find(Auth::user()->company_id);
  ?>
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <!-- <a href="/dashboard" class="simple-text logo-mini">
          CT
        </a> -->
        <a href="/dashboard" class="simple-text logo-normal">
          @if(!empty($company))
          {{ $company->name}}
          @else
          {{__("Company Name")}}
          @endif
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{request()->is('dashboard')?"active":""}}">
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class=" {{request()->is('ticket/*')?"active":""}}">
            <a href="/ticket/index" class="dropdown-toggless">
              <i class="now-ui-icons text_caps-small"></i>
              Tickets
            </a>
          </li>
          <li class="{{\Illuminate\Support\Facades\Auth::user()->role=="admin"||\Illuminate\Support\Facades\Auth::user()->role=="manager"?"":"hidden"}}">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="now-ui-icons text_caps-small"></i>
              Configuration
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
            <?php if (Auth::user()->email == "ashher.azad@gmail.com" || Auth::user()->email == "asher@servex247.com"  || Auth::user()->email == "bilalamjad2772@outlook.com") { ?>
                <li class="{{request()->is('user/*')?"active":""}}">
                  <a href="/user/index">Manage Users</a>
                </li>
              <?php } ?>
              <li class="{{request()->is('company/*')?"active":""}}">
                <a href="/company/index">Manage Company</a>
              </li>
              <li class="{{request()->is('campaign/*')?"active":""}}">
                <a href="/campaign/index">Manage Campaign</a>
              </li>
              <li class="{{request()->is('item/*')?"active":""}}">
                <a href="/item/index">Manage Item</a>
              </li>
              <li class="{{request()->is('department/*')?"active":""}}">
                <a href="/department/index">Manage Department</a>
              </li>
              <li class="{{request()->is('asm/*')?"active":""}}">
                <a href="/asm/index">Manage Asm</a>
              </li>

              <li class="{{request()->is('priority/*')?"active":""}}">
                <a href="/priority/index">Manage Priority</a>
              </li>
              <li class="{{request()->is('location/*')?"active":""}}">
                <a href="/location/index">Manage Location</a>
              </li>
              <li class="{{request()->is('client/*')?"active":""}}">
                <a href="/client/index">Manage Client</a>
              </li>
              <li class="{{request()->is('category/*')?"active":""}}">
                <a href="/category/index">Manage Category</a>
              </li>
              <li class="{{request()->is('type/*')?"active":""}}">
                <a href="/type/index">Manage Type</a>
              </li>
              <li class="{{request()->is('staff/*')?"active":""}}">
                <a href="/staff/index">Manage Staff</a>
              </li>
              
              <li class="{{request()->is('group/*')?"active":""}}">
                <a href="/group/index">Manage Group</a>
              </li>
              <li class="{{request()->is('sla/*')?"active":""}}">
                <a href="/sla/index">Manage SLA</a>
              </li>
              <li class="{{request()->is('distribution/*')?"active":""}}">
                <a href="/distribution/index">Manage Distribution</a>
              </li>
            </ul>
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
            <!-- <a class="navbar-brand" href="#pablo">Table List</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> -->
              

              <li class="nav-item">
                <a class="nav-link" href="/ticket/create">
                  <!-- <i class="now-ui-icons users_single-02"></i> -->
                  <i class="fas fa-plus-circle "></i>
                  Create Ticket
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i>
                  <p>
                    @yield('username')
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="/user/edit/{{\Illuminate\Support\Facades\Auth::user()->getId()}}">Profile</a>
                  <a class="dropdown-item" href="/logout">Logout</a>
                </div>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="/logout">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    @yield('username')
                  </p>
                </a>
              </li> -->
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
        <!-- <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div> -->
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  @yield('scripts')
</body>
<script>
  // Data Table
  $(document).ready(function() {
    $('#tickettable').DataTable();
  });
</script>
<!-- Multi selecter in ticket form -->
<script>
  $(".ticketinput").select2({
    placeholder: "Select",
    allowClear: true,
  });
</script>


</html>

<script>
  $(document).ready(function() {
    $('.multi-select').selectpicker();
  });
</script>