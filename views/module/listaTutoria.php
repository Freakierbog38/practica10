<?php
  
  //Recive el alumno solicitado
  $lista = Datos::allFromTable("fulltuto");

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
                  <th>ID Tutoria</th>
                  <th>Tutor</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Tipo</th>
                  <th>Tema</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lista as $tuto): ?>
                <tr>
                  <td><?php echo $tuto['id']; ?></td>
                  <td><?php echo $tuto['tutor']; ?></td>
                  <td><?php echo $tuto['fecha']; ?></td>
                  <td><?php echo $tuto['hora']; ?></td>
                  <td><?php echo $tuto['tipo']; ?></td>
                  <td><?php echo $tuto['tema']; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Tutoria</th>
                  <th>Tutor</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Tipo</th>
                  <th>Tema</th>
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