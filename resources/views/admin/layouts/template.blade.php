<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin | Dashboard')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Add the necessary CSS and JavaScript files -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<style>
  .content-wrapper {
    transition: margin-left 0.3s;
  }

  .sidebar-hidden .content-wrapper {
    margin-left: 0; /* Adjust margin as needed when the sidebar is hidden */
  }
</style>

<script>
$('#reservationdate').datetimepicker({
        format: 'L'
    });
  </script>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper ">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand " style="background-color: #343a40">
    <!-- Left navbar links -->
    <button id="sidebar-toggle" class="btn text-white" style=" top: 10px; left: 10px; z-index: 1;">
      <i class="fas fa-bars"></i>
    </button>
    <ul class="navbar-nav" style="margin-left: auto;">
      
    
      <li class="nav-link text-white"> {{ Auth::user()->name }}<i class="fas fa-user-shield text-white" style="margin-left:5px;"></i></li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout<i style="margin-left:5px; padding:2px;" class="fas fa-power-off text-white"></i></a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <span class="text-white">Full Screen</span>
          <i class="nav-icon fas fa-expand-arrows-alt text-white p-1"></i>
        </a>
      </li>
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
      <a href="#" class="brand-link">
      <img src="{{asset('dist/img/logo.svg')}}" alt="Image Logo">
        </a>
        <a href="#" class="brand-link" style="text-decoration: none;">
            <span  class="brand-text font-weight-light ml-5 ">S.T.I.T Managment</span>
          </a>

      <!-- Sidebar -->
      <div class="sidebar ">
        <div class="form-inline">
          <div class="input-group">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
            <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Products
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('allproducts')}}" class="nav-link ">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>All Products</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('addproduct')}}" class="nav-link ">
                      <i class="nav-icon fas fa-plus"></i>
                      <p>Add Product</p>
                    </a>
                  </li>
                </ul>
            </li>
            {{-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa --}}
            <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-palette"></i>
                <p>
                  Bobines
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class=" nav-icon fas fa-layer-group"></i>
                    <p>
                      Stock Bobines
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('allbobines')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>All Bobines</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addbobine')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Bobine</p>
                      </a>
                    </li>
                  </ul>
                  {{-- Mecanicien --}}
                  
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fab fa-stack-exchange"></i>
                    <p>
                      Stock Rebobinage
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('allrebobines')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>All Rebobinage</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addrebobine')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Rebobinage</p>
                      </a>
                    </li>
                  </ul>
              </ul>
              <li class="nav-item ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-ribbon"></i>
                  <p>
                    
                    Ribbons
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('allribbons')}}" class="nav-link ">
                      <i class="nav-icon fas fa-list-alt"></i>
                      <p>Stock Ribbon</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addribbon')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Ribbon</p>
                      </a>
                    </li>
                  </ul>
              </li>
              
            
            </li> 
            <li class="nav-item ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Employees
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('allemployees')}}" class="nav-link ">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>All Employees</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('addemployee')}}" class="nav-link ">
                      <i class="nav-icon fas fa-plus"></i>
                      <p>Add Employees</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-rainbow"></i>
                <p>
                  Franges
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('allfranges')}}" class="nav-link ">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>All Franges</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('addfrange')}}" class="nav-link ">
                      <i class="nav-icon fas fa-plus"></i>
                      <p>Add Franges</p>
                    </a>
                  </li>
                </ul>
            </li>
            {{-- Piéces --}}
          
            <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Magazin
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>
                      Piéces De Rechange
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('allpieces')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>All Pieces</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addpiece')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Piéce</p>
                      </a>
                    </li>
                  </ul>
                  {{-- Mecanicien --}}
                  
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-paint-roller"></i>
                    <p>
                      Adhesives
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('alladhesives')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>All Adhesives</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addadhesive')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Adhesive</p>
                      </a>
                    </li>
                  </ul>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-toilet-paper"></i>
                    <p>
                      Tickets
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('alltickets')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>All Tickets</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addticket')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Ticket</p>
                      </a>
                    </li>
                  </ul>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-film"></i>
                    <p>
                      Film Plastique
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('allfilms')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Plastic Stock  </p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addfilm')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add To Stock</p>
                      </a>
                    </li>
                  </ul>
                  {{-- Mecanicien --}}
                  
              </ul>
           
              
            
            </li>
              <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Maintenance
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>
                      Tourneur
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('alltourneurs')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>All Turner</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addtourneur')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Turner</p>
                      </a>
                    </li>
                  </ul>
                  {{-- Mecanicien --}}
                </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-charging-station"></i>
                    <p>
                      Electricien
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('allelectriciens')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>All Electricien</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addelectricien')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Electricien</p>
                      </a>
                    </li>
                  </ul>
                  {{-- Mecanicien --}}
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                      Mecanicien
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('allmecaniciens')}}" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>All Mecaniciens</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('addmecanicien')}}" class="nav-link ">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Mecanicien</p>
                      </a>
                    </li>
                  </ul>
              </ul>
              
            </li>
            <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Quincaillerie
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('allquincailleries')}}" class="nav-link ">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>All Quincaillerie</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('addquincaillerie')}}" class="nav-link ">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>Add Quincaillerie</p>
                  </a>
                </li>
              </ul>
            </li>

        </nav>
        
      </div>
  </aside>



  <div class="content-wrapper">
    <div class="row">
      @yield('content')
    </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer ">
    <strong>Copyright &copy; 2023-2024 <a href="https://stit.com.tn">Stit.com.tn</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
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
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- DataTables  & Plugins -->
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  function initializeDataTable(tableId) {
    $(function () {
      $(tableId).DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo($(tableId + '_wrapper .col-md-6:eq(0)'));

      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  }

  // Appeler la fonction pour chaque DataTable que vous avez
  // initializeDataTable("#example1");
  initializeDataTable("#piece");
  // initializeDataTable("#bobine");
  initializeDataTable("#electricien");
  initializeDataTable("#employee");
  initializeDataTable("#tourneur");
  initializeDataTable("#quincaillerie");
  initializeDataTable("#mecanicien");
  initializeDataTable("#ticket");
  initializeDataTable("#adhesive");
  initializeDataTable("#film");


</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const wrapper = document.querySelector('.wrapper');

    sidebarToggle.addEventListener('click', function () {
      wrapper.classList.toggle('sidebar-hidden');
    });
  });
</script>
  

</body>
</html>
