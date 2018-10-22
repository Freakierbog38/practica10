<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistema </b>Tutorias</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/<?php echo $_SESSION['usuario_foto'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['usuario_nombre'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/<?php echo $_SESSION['usuario_foto'] ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['usuario_nombre']; ?>
                  <small>
                    <?php 
                      switch ($_SESSION["usuario_rol"]):
                        case '0':
                          echo 'Administrador';
                          break;
                        case '1':
                          echo 'Empleado Tutorias';
                          break;
                        case '2':
                          echo 'Profesor';
                          break;
                      endswitch;
                    ?>
                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?action=perfilProfe" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="index.php?action=salir" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
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
          <img src="img/<?php echo $_SESSION['usuario_foto'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['usuario_nombre'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- TUTORIASSS -->
        <?php if($_SESSION["usuario_rol"] == 0): ?>
        <li class="treeview">
          <a href="#">
            <span>Empleados de Tutorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=registroTutor"><i class="fa fa-arrow-right"></i>Registro Empleado de Tutoria</a></li>
            <li><a href="index.php?action=listaTutor"><i class="fa fa-arrow-right"></i>Lista de Empleados Tutoria</a></li>
          </ul>
        </li>
        <?php endif; ?>

        <!-- PROFESORESS -->
        <?php if($_SESSION["usuario_rol"] <= 1): ?>
        <li class="treeview">
          <a href="#">
            <span>Maestros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=registroMaestro"><i class="fa fa-arrow-right"></i>Registro Maestro</a></li>
            <li><a href="index.php?action=listaProfe"><i class="fa fa-arrow-right"></i>Listado de Maestros</a></li>
            <!--li><a href="index.php?action=asignarTutor"><i class="fa fa-arrow-right"></i>Asignar Alumnos</a></li-->
          </ul>
        </li>
        <?php endif; ?>
        
        <!-- ALUMOSSS -->
        <li class="treeview">
          <a href="#">
            <span>Alumno</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($_SESSION["usuario_rol"] <= 1): ?>
            <li><a href="index.php?action=registroAlumno"><i class="fa fa-arrow-right"></i>Registro Alumno</a></li>
            <?php endif; ?>
            <li><a href="index.php?action=listaAlumno"><i class="fa fa-arrow-right"></i>Listado de Alumnos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Tutorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=registroTutoria"><i class="fa fa-arrow-right"></i>Registrar Tutoria</a></li>
            <li><a href="index.php?action=listaTutoria"><i class="fa fa-arrow-right"></i>Lista de Tutorias</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>