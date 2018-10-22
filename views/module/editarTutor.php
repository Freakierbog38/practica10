<?php
//Obtiene el id mediante metodo GET
$id = $_GET['id'];

//Pide al modelo que devuelva los datos necesarios
$profe = Datos::unProfeModel($id, "profull");

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <div  align="center">
       <h1>
          <br>Formulario de Edición<br>
        </h1>
      </div>
      <br> <br>
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

              <h3 class="box-title">EDITAR TUTOR</h3>
              
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label>Nombre: </label>
                 <input type="text" class="form-control" name="nombreEditar" value="<?php echo $profe['nombre']; ?>" required>
                </div>
                
               <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" name="correoEditar" value="<?php echo $profe['correo']; ?>" required>
                </div>

                <div class="form-group">
                  <label>Password: </label>
                 <input type="Password" class="form-control" name="passwordEditar" value="<?php echo $profe['password']; ?>" required>
                </div>

                <div class="form-group">
                  <label for="fotoEditar">Imagen de perfil:</label>
                  <input type="file" name="fotoEditar" accept="image/jpeg, image/png">
                </div>

                <div class="form-group">
                  <input type="hidden" name="rolEditar" value="1">
                </div>
                
                <div class="form-group">
                  <input type="hidden" name="carreraEditar" value="6">
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    //Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
    $registro = new MvcController();

    //se invoca la funcion registrousuariocontroller de la clase mvccontroller;
    $registro -> editarTutorController($id);
?>