<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <div  align="center">
       <h1>
          <br>  Formulario de Registro <br>
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

              <h3 class="box-title">REGISTRAR TUTORIA</h3>
              
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form method="POST">
                
                <div class="form-group">
                  <label for="tutorRegistro">Tutor: </label>
                  <select name="tutorRegistro" class="form-control">
                    <?php 
                    $r = Datos::allFromTable("profull");
                    foreach ($r as $dato):
                      if($dato['rol'] == 2){ ?>
                        <option value=<?php echo $dato['numero'] ?>> <?php echo $dato['nombre'] ?> </option>
                    <?php 
                    }endforeach; ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <input name="tipoRegistro" type="hidden" value="Individual">
                </div>

                <div class="form-group">
                  <label for="alumnoRegistro">Alumno: </label>
                  <select name="alumnoRegistro" class="form-control">
                  <?php 
                    $arr = array('numero' => $_SESSION['usuario_id'],
                       'rol' => $_SESSION['usuario_rol']);
                    $r = Datos::alumnosModel($arr, "alumnofull");
                    foreach ($r as $alumno): 
                  ?>
                    <option value="<?php echo $alumno['matricula']; ?>"><?php echo $alumno['nombre']; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="temaRegistro">Tema de la tutoría:</label>
                  <select name="temaRegistro" class="form-control">
                    <option value="" selected>Elija una opción...</option>
                    <option value="Problema familiar">Problema familiar</option>
                    <option value="Drogas">Drogas</option>
                    <option value="Financiero">Financiero</option>
                    <option value="Personal">Personal</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="obseRegistro">Textarea</label>
                  <textarea class="form-control" name="obseRegistro" rows="3" placeholder="Escriba sus observaciones"></textarea>
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
    $registro -> registroTutoriaController();

    if(isset($_GET["action"])){
      if($_GET["action"] == "okT"){
        echo '<div class="alert alert-success alert-dismissible">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo '<h4><i class="icon fa fa-check"></i>';
        echo ' Alert! </h4>';
        echo 'Tutoria agregada con éxito';
        echo '</div>';
      }
    }
    
?>