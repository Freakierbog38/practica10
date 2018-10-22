<?php
  $id = $_GET['id'];
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#007612</small>
      </h1>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-warning" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-warning"></i> Advertencia:</h4>
        Está por eliminar un registro. Si está seguro de la acción vuelva a introducir su contraseña:
        <form method="POST">
          <div class="row">
            <div class="col-xs-3 col-xs-offset-1">
              <input type="password" class="form-control" name="passConf" required>
            </div>
            <div class="col-xs-1">
              <input type="submit" class="btn btn-default" value="Confirmar">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="clearfix"></div>

  <!-- /.content-wrapper -->
  <?php
    //Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
    $eliminar = new MvcController();

    //se invoca la funcion registrousuariocontroller de la clase mvccontroller;
    $eliminar -> eliminarProfeController($id);
  ?>