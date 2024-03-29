<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @yield('head')
  <title>SYS BDS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Trang Chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('staff.client.list.get')}}" class="nav-link">Khách hàng</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form action="{{route('staff.search.get')}}" method="get" class="form-inline ml-3" >
      <div class="input-group input-group-md">
        <input name="keyword" class="form-control form-control-navbar" type="search" placeholder="Số điện thoại / Biên nhận" aria-label="Tìm số điện thoại">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SYS BDS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('staff.profile.edit.get')}}" class="d-block">{{ UserInfo()->name }}</a>
        </div>
        <div class="info">
          <a href="{{route('staff.logout.get')}}" class="d-block"><i class="fa fa-sign-out"></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Danh Sách Bán BDS
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('staff.ticket.list.get')}}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Danh sách bán BDS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('staff.ticketlog.list.get')}}" class="nav-link">
                  <i class="fa fa-history nav-icon"></i>
                  <p>Nhật ký thay đổi</p>
                </a>
              </li>
            </ul>
          </li>
          @if(UserInfo()->level>=3)
          <li class="nav-item">
            <a href="{{route('staff.client.list.get')}}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Danh sách khách hàng
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-university"></i>
              <p>
                Dự án
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('staff.course.list.get')}}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Danh sách dự án</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('staff.course.add.get')}}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm dự án mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('staff.courselog.list.get')}}" class="nav-link">
                  <i class="fa fa-history nav-icon"></i>
                  <p>Nhật ký dự án</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Thu - Chi
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('staff.receipt.list.get')}}" class="nav-link">
                  <i class="fa fa-arrow-left nav-icon"></i>
                  <p>Phiếu thu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('staff.payment.list.get')}}" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Phiếu chi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">-->
          <!--  <a href="#" class="nav-link ">-->
          <!--    <i class="nav-icon fa fa-line-chart"></i>-->
          <!--    <p>-->
          <!--      Thống kê-->
          <!--      <i class="right fa fa-angle-left"></i>-->
          <!--    </p>-->
          <!--  </a>-->
          <!--  <ul class="nav nav-treeview">-->
          <!--    <li class="nav-item">-->
          <!--      <a href="/thongke/biennhan/2019" class="nav-link">-->
          <!--        <i class="fa fa-circle-o nav-icon"></i>-->
          <!--        <p>Kỹ thuật 2019</p>-->
          <!--      </a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</li> -->

          {{-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-link"></i>
              <p>
                Sản phẩm
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('staff.download.list.get')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('staff.download.add.get')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Thêm sản phẩm mới</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('main')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-alpha
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
@yield('script')
</body>
</html>
