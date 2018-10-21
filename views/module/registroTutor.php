<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <div  align="center">
       <h1>
          <br>  Formulario de Registro <br>
        </h1>
      </div>
      <br> <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
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

              <h3 class="box-title">REGISTRAR TUTOR</h3>
              
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label>Nombre: </label>
                 <input type="text" class="form-control" name="nombreRegistro" placeholder="Nombre y Apellidos" required>
                </div>
                
               <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" name="correoRegistro" placeholder="usuario@upv.com" required>
                </div>

                <div class="form-group">
                  <label>Password: </label>
                 <input type="Password" class="form-control" name="passwordRegistro" placeholder="password" required>
                </div>

                <div class="form-group">
                  <label for="fotoRegistro">Imagen de perfil:</label>
                  <input type="file" name="fotoRegistro" accept="image/jpeg, image/png">
                </div>

                <div class="form-group">
                  <input type="hidden" name="rolRegistro" value="1">
                </div>
                
                <div class="form-group">
                  <input type="hidden" name="carreraRegistro" value="6">
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    //Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
    $registro = new MvcController();

    //se invoca la funcion registrousuariocontroller de la clase mvccontroller;
    $registro -> registroTutorController();

    if(isset($_GET["action"])){
      if($_GET["action"] == "okT"){
        echo '<div class="alert alert-success alert-dismissible">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<h4><i class="icon fa fa-check"></i>';
        echo ' Alert! </h4>';
        echo 'Profesor agregado con éxito';
        echo '</div>';
      }
    }
    
?>