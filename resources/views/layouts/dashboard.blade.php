<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Custom fonts for this template-->
  <link href="/webcss/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/webcss/css/sb-admin-2.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="{{ asset('images/logotri.png') }}" class="img-fluid" width="50px" height="50px">

        </div>
        <div class="sidebar-brand-text mx-3">BioBerries <sup>BB</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url ('home') }}">
          <i class="fas fa-fw fa-home" style="color:#FF9E00"></i>
          <span>Principal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Panel Administrativo
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true"
          aria-controls="collapseone">
          <i class="far fa-calendar-check" style="color:#44D829"></i>
          <span>Aseguramiento Calidad</span>
        </a>
       
        <div id="collapseone" class="collapse" aria-labelledby="headingone" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Componentes:</h6>
             @can('auditoria.index')
            <a class="collapse-item" href="{{ url ('auditoria/rejected') }}">Proceso</a>

            <a class="collapse-item" href="{{ url ('auditoria/rejectedLote') }}">Producto Terminado</a>

            <a class="collapse-item" href="{{ url ('auditoria/rejectedReception') }}">Recepción</a>
            @endcan
          </div>
        </div>
       
      </li>
        <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#delete"
          aria-expanded="true" aria-controls="collapseReport">
          <i class="fas fa-fw fa-pallet" style="color:#FFEC00"></i>
          <span>Panel De Eliminación:</span></a>
        </a>
        <div id="delete" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Seleccione:</h6>
              <!-- Usuarios -->
            @can('receptions.delete')
            <a class="collapse-item" href="{{ url ('receptions/delete') }}">Recepcion</a>

            @endcan  
            @can('receptions.delete')
            <a class="collapse-item" href="{{ url ('processes/delete') }}">Proceso</a>

            @endcan  
            @can('receptions.delete')
            <a class="collapse-item" href="{{ url ('subprocess/delete') }}">Producto sin Terminar</a>

            @endcan  
            @can('receptions.delete')
            <a class="collapse-item" href="{{ url ('lotes/delete') }}">Productos palletizados</a>

            @endcan 
            @can('receptions.delete')
            <a class="collapse-item" href="{{ url ('dispatch/delete') }}">Despacho</a>

            @endcan
              @can('receptions.delete')
            <a class="collapse-item" href="{{ url ('subreprocesses/delete') }}">Reprocesados</a>

            @endcan  
          </div>
        </div>
      </li>



      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Recursos Humanos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Componentes:</h6>

            <!-- Usuarios -->
            @can('users.index')
            <a class="collapse-item" href="{{ url ('users') }}">Usuarios</a>

            @endcan
            <!-- Roles -->
            @can('users.index')
            <a class="collapse-item" href="{{ url ('roles') }}">Roles de usuario</a>
            @endcan
          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Configuraciones</span>
        </a>

        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Herramientas:</h6>


            <!-- Isumos -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('supplies') }}">Bandejas</a>
            @endcan

            <!-- Motivos de rechazo -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('rejecteds') }}">Rechazos</a>
            @endcan

            <!-- Proveedores -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('providers') }}">Productores</a>

            @endcan

            <!-- Quality -->
            @can('admin.supplies.index')

            <a class="collapse-item" href="{{ url ('quality') }}">Calidad</a>

            @endcan

            <!-- Exportadores -->
            @can('admin.supplies.index')

            <a class="collapse-item" href="{{ url ('exporters') }}">Exportadores</a>

            @endcan
            <!-- Tipos Formato -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('formats') }}">Formato de Caja</a>

            @endcan
            <!-- Estatus -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('statuses') }}">Estatus de Fruta</a>
            @endcan

            <!-- Tipos Frutas -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('fruits') }}">Fruta</a>
            @endcan

            <!-- Tipos variedades -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('varieties') }}">Variedad de fruta</a>
            @endcan

            <!-- Tipos despacho -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('tipodispatches') }}">Tipo de despacho</a>
            @endcan

            <!-- Tipos despacho -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('tipotransportes') }}">Tipo de Transporte</a>
            @endcan



            <!--  Temporada -->
            @can('admin.supplies.index')
            <a class="collapse-item" href="{{ url ('seasons') }}">Temporada</a>
            @endcan

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Linea Principal
      </div>

      <!-- Nav Item -->
      @can('receptions.index')
      <li class="nav-item">
        <a class="nav-link" href="{{ url ('receptions') }}">
          <i class="fas fa-fw fa-boxes" style="color:#00F0FF"></i>
          <span>Recepción </span>

        </a>
      </li>



      @endcan

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport2"
          aria-expanded="true" aria-controls="collapseReport">
          <i class="fas fa-fw fa-pallet" style="color:#FFEC00"></i>
          <span>Proceso</span></a>
        </a>
        <div id="collapseReport2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proceso:</h6>
            @can('process.processes.index')
            <a class="collapse-item" href="{{ url ('processes') }}">Proceso</a>
            @endcan

            @can('process.processes.index')
            <a class="collapse-item" href="{{ url ('lotes') }}">Lotes</a>
            @endcan

          </div>
        </div>
      </li>


    





      <!-- Nav Item -->
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport10"
          aria-expanded="true" aria-controls="collapseReport">
          <i class="fas fa-fw fa-archive" style="color:#DE850C"></i>
          <span>Camara</span>
        </a>
        <div id="collapseReport10" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Camara:</h6>
            @can('lotes.index')
            <a class="collapse-item" href="{{ url ('camara') }}">Producto terminado</a>
          
            <a class="collapse-item" href="{{ url ('camarasubreprocess') }}">Reprocesados</a>
            
            <a class="collapse-item" href="{{ url ('camaralote') }}">Paletizados</a>
            @endcan
         

          </div>
        </div>
      </li>

    @can('dispatch.index')
      <li class="nav-item">
        <a class="nav-link" href="{{ url ('dispatch') }}">
          <i class="fas fa-fw fa-truck-loading" style="color:#55FF00"></i>
          <span>Despachar </span>

        </a>
      </li>

      @endcan

        @can('reprocess.reprocesses.index')
      <li class="nav-item">
        <a class="nav-link" href="{{ url ('reprocesses') }}">
          <i class="fas fa-retweet" style="color:#F99E00"></i>
          <span>En Tránsito </span>

        </a>
      </li>



      @endcan

  

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true"
          aria-controls="collapseReport">
          <i class="fas fa-fw fa-book-open" style="color:#FFFFFF"></i>
          <span>Reportes</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <h6 class="collapse-header">Recepción:</h6>
            @can('receptions.receptionsdaily')
            <a class="collapse-item" href="{{ url ('receptionsdaily') }}">Reporte por Fecha</a>
            <a class="collapse-item" href="{{ url ('receptionsperfruit') }}">Reporte por Fruta</a>
            <a class="collapse-item" href="{{ url ('receptionsperproductor') }}">Reporte por Productor</a>
            
            <div class="dropdown-divider"></div>
            <h6 class="collapse-header">Proceso:</h6>

            <a class="collapse-item" href="{{ Route ('reporteProcesoDaily') }}">Reporte por Fecha</a>
            <a class="collapse-item" href="{{ Route ('reporteProcesoFruit') }}">Reporte por Fruta</a>
          
            <div class="dropdown-divider"></div>
            <h6 class="collapse-header">Camara:</h6>
            
            <a class="collapse-item" href="{{ Route ('reporteCamaraFruit') }}">Reporte por Fruta</a>
            
            <div class="dropdown-divider"></div>
            <h6 class="collapse-header ">Despacho:</h6>

            <a class="collapse-item" href="{{ Route ('reporteDespachoDaily') }}">Despachos Realizados</a>
            <a class="collapse-item" href="{{ Route ('reporteDespachoFruit') }}">Fruta despachada</a>
            
            <div class="dropdown-divider"></div>
            @endcan
          </div>
        </div>


        @can('admin.trays.index')

      <li class="nav-item">
        <a class="nav-link" href="{{ url ('trays') }}">
          <i class="fas fa-fw fa-pallet" style="color:#FFEC00"></i>
          <span>Control de Bandejas</span></a>
      </li>

      @endcan

      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }} </span>
                <img class="img-profile rounded-circle"
                  src="https://static05.cminds.com/wp-content/uploads/computer-1331579_1280-1-300x300.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" data-toggle="modal"
                  data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>

                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
                <a>

                  <div class="dropdown-divider"></div>


              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
          </div>


          <div class="row">



            @yield('section')

          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; TriBrains 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"
    integrity="sha256-y1bcuJgVgLha8+mzcg7TB2OHNDC2ZQvaJZmoXM0hxx0=" crossorigin="anonymous"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="/webcss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/webcss/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/webcss/js/sb-admin-2.min.js"></script>

</body>

</html>