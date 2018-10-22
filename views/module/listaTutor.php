<?php
  
  //Recive el alumno solicitado
  $lista = Datos::tutorModel("profull");

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tutorias
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Empleados de Tutorias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No. De Empleado</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lista as $profe): ?>
                <tr>
                  <td><?php echo $profe['numero']; ?></td>
                  <td><?php echo $profe['nombre']; ?></td>
                  <td><?php echo $profe['correo']; ?></td>
                  <td><a href="index.php?action=editarTutor&id=<?php echo $profe['numero']; ?>"><button class="btn btn-block btn-warning btn-xs"><i class="fa fa-pencil"></button></i></a></td>
                  <td><a href="index.php?action=eliminarProfe&id=<?php echo $profe['numero']; ?>"><button class="btn btn-block btn-danger btn-xs"><i class="fa fa-trash"></button></i></a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No. De Empleado</th>
                  <th>Nombre</th>
                  <th>Correo</th>
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