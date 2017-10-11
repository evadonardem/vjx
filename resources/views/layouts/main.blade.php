<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Load Common Libraries -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('twbs/bootstrap/dist/css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ asset('twbs/bootstrap/dist/js/bootstrap.min.js') }}"></script>    

    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

    <script type="text/javascript" src="{{ asset('adminlte/dist/js/app.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/skin-purple.min.css') }}">

    <title>@yield('title')</title>
  </head>
  <body class="skin-purple sidebar-mini">

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SVJX</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SVJX</b> Ukay-Ukay</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              @if(Auth::user())
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                  <!-- Menu toggle button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>
                      <!-- inner menu: contains the messages -->
                      <ul class="menu">
                        <li><!-- start message -->
                          <a href="#">
                            <div class="pull-left">
                              <!-- User Image -->
                              <img src="###" class="img-circle">
                            </div>
                            <!-- Message title and timestamp -->
                            <h4>
                              Support Team
                              <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <!-- The message -->
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>
                        <!-- end message -->
                      </ul>
                      <!-- /.menu -->
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                  </ul>
                </li>
                <!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                  <!-- Menu toggle button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                      <!-- Inner Menu: contains the notifications -->
                      <ul class="menu">
                        <li><!-- start notification -->
                          <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                          </a>
                        </li>
                        <!-- end notification -->
                      </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                  </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag-o"></i>
                    <span class="label label-danger">9</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">You have 9 tasks</li>
                    <li>
                      <!-- Inner menu: contains the tasks -->
                      <ul class="menu">
                        <li><!-- Task item -->
                          <a href="#">
                            <!-- Task title and progress text -->
                            <h3>
                              Design some buttons
                              <small class="pull-right">20%</small>
                            </h3>
                            <!-- The progress bar -->
                            <div class="progress xs">
                              <!-- Change the css width attribute to simulate progress -->
                              <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% Complete</span>
                              </div>
                            </div>
                          </a>
                        </li>
                        <!-- end task item -->
                      </ul>
                    </li>
                    <li class="footer">
                      <a href="#">View all tasks</a>
                    </li>
                  </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="{{ asset('images/photo_placeholder.jpg') }}" class="user-image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="{{ asset('images/photo_placeholder.jpg') }}" class="img-circle">

                      <p>
                        {{ Auth::user()->name }} - Seller
                        <small>Member since {{ Auth::user()->created_at }}</small>
                      </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                      <div class="row">
                        <div class="col-xs-4 text-center">
                          <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Friends</a>
                        </div>
                      </div>
                      <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                      </div>
                    </li>
                  </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
              @else
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> <span>Login</span></a></li>
              @endif
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Booth</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Request::is('/') || Request::is('booth') ? 'active' : null }}" ><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="treeview {{ Request::is('booth/sellers/*') ? 'active' : null }}">

              <?php
                $sellers = App\User::all();
              ?>

              <a href="#"><i class="fa fa-users"></i> <span>Sellers</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @foreach($sellers as $seller)
                <li class="{{ Request::is('/') || Request::is('booth/sellers/'.$seller->id.'/items') ? 'active' : null }}"><a href="{{ action('BoothController@sellerItems', $seller->id) }}"><i class="fa fa-user"></i> {{ $seller->name }}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="#location"><i class="fa fa-map-marker"></i> <span> Location</span></a></li>
          </ul>

          @if(Auth::user())
          <ul class="sidebar-menu">
            <li class="header">Item Management</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Request::is('dashboard') ? 'active' : null }}"><a href="{{ action('DashboardController@index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::is('items*') ? 'active' : null }}"><a href="{{ action('ItemController@index') }}"><i class="fa fa-list"></i> <span>My Items</span></a></li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
            </li>
          </ul>
          @endif

          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          <div class="row">
            <div class="col-md-8">
              @yield('content')
            </div>
            <div class="col-md-4">
              <div class="well well-lg">

                <h4 class="page-header">Bulletin</h4>

                <div class="row">
                  <div class="col-md-12">
                    <div class="fb-like"
                      data-href="{{ url('/') }}"
                      data-layout="standard"
                      data-action="like"
                      data-size="large"
                      data-show-faces="true"
                      data-share="true"></div>
                  </div>
                  <div class="col-md-12">
                    <div class="fb-comments" data-href="{{ url('/') }}" data-width="100%" data-numposts="5"></div>
                  </div>
                </div>

                <div class="row">
                  @for($i=0; $i<3; $i++)
                  <div class="col-md-12">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>Clearance Sale</h3>

                        <p>Thursday, August 21, 2017</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  @endfor
                </div>

                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-calendar-check-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Sold Items Today</span>
                    <span id="totalSoldItemsToday" class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

                <div id="soldItemsToday">

                </div>

              </div>
            </div>
          </div>

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">

        <!-- Location -->
        <div class="row">
          <div class="col-md-12">
            <h2 id="location" class="page-header"><i class="fa fa-map-marker"></i> Location</h2>
            <address class="">
              <strong>Mix-Mix Klozet</strong><br>
              Rooftop Maharlika Livehood Center <br>
              Magsaysay Avenue, Baguio City, 2600, Benguet, Philippines
            </address>
            <div id="map" style="width: 100%; height: 400px;"></div>
            <script>
            function myMap() {
                var uluru = { lat: 16.414163, lng: 120.594745 };
                var map = new google.maps.Map(document.getElementById("map"), {
                  zoom: 17,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  animation: google.maps.Animation.BOUNCE,
                  title: 'Mix-Mix Klozet',
                  position: uluru,
                  map: map
                });
            }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEF1WilHPgTZHFk_3iSz5qpDCmXuq7XAI&callback=myMap"></script>
          </div>
        </div>



        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <p><span class="badge">DHM</span></p>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}">SVJX Ukay-Ukay</a> <em>"At your finger tips"</em>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="pull-right-container">
                      <span class="label label-danger pull-right">70%</span>
                    </span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->

          </div>
          <!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                  Some information about this general settings option
                </p>
              </div>
              <!-- /.form-group -->
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
      $(function() {
        $.ajax({
          url: "{{ url('api/get_sold_items_today') }}",
          dataType: 'json',
          type: 'get',
          success: function(data) {
            $('#totalSoldItemsToday').text(data.length);
            var div = $('<div class="row"/>');
            // for(i in data) {
            //   var col = $('<div class="col-md-6" />');
            //   var record = data[i];
            //   col.append('<img src="{{ asset("storage") }}/'+record.thumbnail_path+'" class="img-responsive img-thumbnail" width="100%">');
            //   col.append('<p><i class="fa fa-user"></i> '+record.user.name+'<br><i class="fa fa-check"></i> Sold Item #'+record.id+'</p>')
            //   div.append(col);
            // }
            // $('#soldItemsToday').html(div);
          }
        });
      });
    </script>

    @yield('scripts')

  </body>
</html>
