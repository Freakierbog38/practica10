<?php

  $datosModel = array(
    'rol' =>  $_SESSION['usuario_rol'],
    'numero' => $_SESSION['usuario_id']);
  
  //Recive el alumno solicitado
  $lista = Datos::alumnosModel($datosModel ,"alumnofull");

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alumnos
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de alumnos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Matricula</th>
                  <th>Nombre</th>
                  <th>Carrera</th>
                  <th>Tutor</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lista as $alumno): ?>
                <tr>
                  <td><?php echo $alumno['matricula']; ?></td>
                  <td><?php echo $alumno['nombre']; ?></td>
                  <td><?php echo $alumno['carrera']; ?></td>
                  <td><?php echo $alumno['tutor']; ?></td>
                  <td><a href="index.php?action=editarAlumno&id=<?php echo $alumno['matricula']; ?>"><button class="btn btn-block btn-warning btn-xs"><i class="fa fa-pencil"></button></i></a></td>
                  <td><a href="index.php?action=eliminarAlumno&id=<?php echo $alumno['matricula']; ?>"><button class="btn btn-block btn-danger btn-xs"><i class="fa fa-trash"></button></i></a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Matricula</th>
                  <th>Nombre</th>
                  <th>Carrera</th>
                  <th>Tutor</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>