<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="token" id="token" value="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>BIBLIOTECA UTC</title>
  <!-- Tell the browser to be responsive to screen width -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="js/vue.js"></script>
  <script type="text/javascript" src="js/vue-resource.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
    <span class="logo-mini "><b class="text-warning"><b class="text-white">-------</b>U</b><b class="text-success font-italic">TC</b></span>
      <!-- <img src="img/utc.jpg" class="brand-image img-rounded elevation-3"
           style="opacity: .8"> -->
      <span class="text-warning font-weight-italic">Biblioteca<b class="text-white">-------</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h6 class="text-light font-weight-bold">{{Session::get('nombre')}} {{Session::get('ap')}}</h6>
          <small class=" text-white font-italic">{{Session::get('rol')}}</small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-book">  Libros   </i>

            </a>


            <ul class="nav nav-treeview">
              @if(Session::get('rol') == "Bibliotecario" || Session::get('rol') == "Administrador" )
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Lectores
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('usuario')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('tipo')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          @if(Session::get('rol') == "Bibliotecario" || Session::get('rol') == "Administrador" )
          <li class="nav-item has-treeview">
              <a href="" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Libros
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('libro')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('ejemplar')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ejemplares</p>
                  </a>
                </li>
              </ul>
              <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('autor')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Autores</p>
                  </a>
                </li>
              </ul> -->
              <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('editorial')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editoriales</p>
                  </a>
                </li>
              </ul> -->

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('materia')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sección</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif
              @if(Session::get('rol') == "Administrador")
            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar</p>
                  </a>
                </li>
              </ul>
            </li>
            @endif

            </ul>
          </li>
          @if(Session::get('rol') == "Bibliotecario" || Session::get('rol') == "Administrador")
          <li class="nav-header">SECCIÓN DE PRESTAMOS</li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Prestamos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('prestamo')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('dev')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Devoluciones</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todos</p>
                </a>
              </li> -->
            </ul>
          </li>
          @endif
          @if(Session::get('rol') == "Bibliotecario" || Session::get('rol') == "Administrador" )
          <li class="nav-header">SESIÓN</li>
          <li class="nav-item">
                <a href="{{url('logout')}}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Salir</p>
                </a>
              </li>
            @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
        @yield('contenido')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    @stack('scripts')

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="js/sweetalert2.all.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('js')

</body>
</html>
