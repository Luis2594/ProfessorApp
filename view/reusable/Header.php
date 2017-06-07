<html>
  <head>
    <meta charset="UTF-8">
    <title>Cindea Turrialba</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="./../resource/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="./../resource/css/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="./../resource/css/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="./../resource/css/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="./../resource/css/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="./../resource/css/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="./../resource/css/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="./../resource/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="./../resource/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="./Home.php" class="logo"><b>Cindea</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            <!--ENROLLMENT-->
            <li class="treeview">
              <a>
                <i class="fa"></i> <span>Matrícula</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href=""><i class="fa"></i>Ver matricula de estudiantes</a></li>
                <li class="active"><a href=""><i class="fa"></i>Matricular Estudiante</a></li>
                <li><a href=""><i class="fa"></i>Actualizar Matrícula</a></li>
                <li><a href=""><i class="fa"></i>Eliminar Matrícula</a></li>
              </ul>
            </li>
            
            <!--COURSES-->
            <li class="treeview">
              <a>
                <i class="fa"></i> <span>Cursos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href=""><i class="fa"></i>Ver Cursos</a></li>
                <li class="active"><a href=""><i class="fa"></i>Crear Curso</a></li>
                <li><a href=""><i class="fa"></i>Actualizar Curso</a></li>
                <li><a href=""><i class="fa"></i>Eliminar Curso</a></li>
              </ul>
            </li>
            
            <!--CURRICULUM-->
            <li class="treeview">
              <a>
                <i class="fa"></i> <span>Maya curricular</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href=""><i class="fa"></i>Ver Maya Curricular</a></li>
                <li class="active"><a href=""><i class="fa"></i>Crear Maya Curricular</a></li>
                <li><a href=""><i class="fa"></i>Actualizar Maya Curricular</a></li>
                <li><a href=""><i class="fa"></i>Eliminar Maya Curricular</a></li>
              </ul>
            </li>
            
            <!--TEACHER-->
            <li class="treeview">
              <a>
                <i class="fa"></i> <span>Profesores</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href=""><i class="fa"></i>Ver Profesores</a></li>
                <li class="active"><a href=""><i class="fa"></i>Crear Profesor</a></li>
                <li><a href=""><i class="fa"></i>Actualizar Profesor</a></li>
                <li><a href=""><i class="fa"></i>Eliminar Profesor</a></li>
              </ul>
            </li>
            
            <!--SCHEDULE-->
            <li class="treeview">
              <a>
                <i class="fa"></i> <span>Horarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href=""><i class="fa"></i>Ver Horarios</a></li>
                <li class="active"><a href=""><i class="fa"></i>Crear Horarios</a></li>
                <li><a href=""><i class="fa"></i>Actualizar Horario</a></li>
                <li><a href=""><i class="fa"></i>Eliminar Horario</a></li>
              </ul>
            </li>
            
            <!--INFO-->
            <li class="treeview">
              <a>
                <i class="fa"></i> <span>Información del Cindea</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href=""><i class="fa"></i>Ver Información</a></li>
                <li class="active"><a href=""><i class="fa"></i>Crear Información</a></li>
                <li><a href=""><i class="fa"></i>Actualizar Información</a></li>
                <li><a href=""><i class="fa"></i>Eliminar Información</a></li>
              </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
          </ol>
        </section>
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px;display: none;" ></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px; display: none;" ></div>
                  <div class="chart" id="line-chart" style="display: none;"></div>