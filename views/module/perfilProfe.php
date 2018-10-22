<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="invoice">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h1 class="box-title">
            Perfil
            <small>#<?php echo $_SESSION['usuario_id'] ?></small>
          </h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt>Foto de Perfil:</dt>
            <dd><img src="img/<?php echo $_SESSION['usuario_foto'] ?>" width="200" height="200"></dd>
            <br>
            <dt>Nombre:</dt>
            <dd><?php echo $_SESSION['usuario_nombre'] ?></dd>
            <br>
            <dt>Rol:</dt>
            <dd><?php switch ($_SESSION["usuario_rol"]):
                        case '0':
                          echo 'Administrador';
                          break;
                        case '1':
                          echo 'Empleado Tutorias';
                          break;
                        case '2':
                          echo 'Profesor';
                          break;
                      endswitch; ?></dd>
            <br>
            <dt>Correo:</dt>
            <dd><?php echo $_SESSION['usuario_email'] ?></dd>
            <br>
            <dt>Carrera:</dt>
            <dd><?php echo $_SESSION['usuario_carrera'] ?></dd>
            <br>
            <dt></dt>
            <dd><a href="index.php?action=<?php if($_SESSION['usuario_rol']<2) echo('editarTutor'); else echo('editarMaestro'); ?>&id=<?php echo $_SESSION['usuario_id'] ?>"><button class="btn btn-primary"">Editar</button></a></dd>
          </dl>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  <!-- /.content-wrapper -->