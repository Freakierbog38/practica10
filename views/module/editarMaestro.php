<?php
//Obtiene el id mediante metodo GET
$id = $_GET['id'];

//Pide al modelo que devuelva los datos necesarios
$profe = Datos::unProfeModel($id, "profull");

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <div align="center">
        <h1>
          <br>Formulario de Edición<br>
        </h1>
      </div>
    </section>

      <!-- Main row -->
      <div class="row"> <!--COLUMNA 2-->
        <!-- Left col -->
        <!--FORMULARIOOOO-->
        <section class="col-lg-10 col-md-offset-1">
          <!-- FORMULARIO -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-address-card-o" aria-hidden="true"></i>

              <h3 class="box-title">EDITAR MAESTRO</h3> 
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="carreraEditar">Carrera: </label><br>
                  <select name="carreraEditar" class="form-control">
                    <?php 
                    $r = Datos::allFromTable("carrera");
                    foreach ($r as $dato): ?>
                      <option value=<?php echo $dato['id'] ?> <?php if($dato['nombre']==$profe['carrera']) echo "selected" ?>> <?php echo $dato['nombre'] ?> </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="nombreEditar">Nombre: </label>
                  <input type="text" class="form-control" name="nombreEditar" value="<?php echo $profe['nombre'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="correoEditar">Correo: </label>
                  <input type="email" class="form-control" name="correoEditar" value="<?php echo $profe['correo'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="passwordEditar">Contraseña: </label>
                  <input type="password" class="form-control" name="passwordEditar" value="<?php echo $profe['password'] ?>" required>
                </div>

                <div class="form-group">
                  <input type="hidden" class="form-control" name="rolEditar" value="2">
                </div>

                <div class="form-group">
                  <label for="fotoEditar">Imagen de perfil:</label>
                  <input type="file" name="fotoEditar" accept="image/jpeg, image/png">
                </div>

                <div class="row">
                  <div class="col-md-offset-10 col-md-2">
                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Actualizar">
                  </div>
                </div>

            </form>
            </div>
          </div>
        </section>
        <!--***********************TERMINA COLUMNA ********************************************************-->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    //Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
    $registro = new MvcController();

    //se invoca la funcion registrousuariocontroller de la clase mvccontroller;
    $registro -> editarProfeController($id);
    
?>