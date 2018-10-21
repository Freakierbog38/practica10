<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <div align="center">
        <h1>
          <br> Formulario de Registro <br>
        </h1>
      </div>
      <ol class="breadcrumb">
        <li><a href="#"> Registro </a></li>
        <li class="active"></li>
      </ol>
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

              <h3 class="box-title">REGISTRAR MAESTRO</h3> 
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="carreraRegistro">Carrera: </label><br>
                  <select name="carreraRegistro" class="form-control">
                    <?php 
                    $r = Datos::allFromTable("carrera");
                    foreach ($r as $dato): ?>
                      <option value=<?php echo $dato['id'] ?>> <?php echo $dato['nombre'] ?> </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="nombreRegistro">Nombre: </label>
                  <input type="text" class="form-control" name="nombreRegistro" placeholder="Nombre y Apellidos" required>
                </div>

                <div class="form-group">
                  <label for="nombreRegistro">Correo: </label>
                  <input type="email" class="form-control" name="correoRegistro" placeholder="ejemplo@email.com" required>
                </div>

                <div class="form-group">
                  <label for="nombreRegistro">Contraseña: </label>
                  <input type="password" class="form-control" name="passwordRegistro" placeholder="Contraseña" required>
                </div>

                <div class="form-group">
                  <input type="hidden" class="form-control" name="rolRegistro" value="2">
                </div>

                <div class="form-group">
                  <label for="fotoRegistro">Imagen de perfil:</label>
                  <input type="file" name="fotoRegistro" accept="image/jpeg, image/png">
                </div>

                <div class="row">
                  <div class="col-md-offset-10 col-md-2">
                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Registrar">
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
    $registro -> registroProfesorController();

    if(isset($_GET["action"])){
      if($_GET["action"] == "okP"){
        echo '<div class="alert alert-success alert-dismissible">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<h4><i class="icon fa fa-check"></i>';
        echo ' Alert! </h4>';
        echo 'Profesor agregado con éxito';
        echo '</div>';
      }
    }
    
?>