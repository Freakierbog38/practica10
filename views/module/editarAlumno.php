<?php
//Obtiene el id mediante metodo GET
$id = $_GET['id'];

//Pide al modelo que devuelva los datos necesarios
$alumno = Datos::unAlumnoModel($id, "alumno");

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div align="center">
        <h1>
          <br> Formulario de Edición <br>
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

              <h3 class="box-title">EDITAR ALUMNO</h3>
              <?php 
              if(isset($_GET["action"])){
                      if($_GET["action"] == "okA"){
                          echo '<div class="alert alert-success alert-dismissible">';
                          echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                          echo '<h4><i class="icon fa fa-check"></i>';
                          echo ' Alert! </h4>';
                          echo 'Alumno agregado con éxito';
                          echo '</div>';
                      }
                  }
              ?>
            </div>
            <div class="box-body">
              <form method="POST">
                <div class="form-group">
                  <label for="matriculaEditar">Matricula: </label>
                 <input type="text" class="form-control" name="matriculaEditar" value="<?php echo $alumno['matricula'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="nombreEditar">Nombre: </label>
                 <input type="text" class="form-control" name="nombreEditar" value="<?php echo $alumno['nombre'] ?>" required>
                </div>
                
                <div class="form-group">
                  <label for="carreraEditar">Carrera: </label> <br>
                  <select name="carreraEditar" class="form-control">
                    <?php 
                    $r = Datos::allFromTable("carrera");
                    foreach ($r as $dato): ?>
                      <option value="<?php echo $dato['id']; ?>" <?php if($dato['id'] == $alumno['carrera'])  echo "selected" ?>> <?php echo $dato['nombre'] ?> </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="tutorEditar">Tutor: </label><br>
                  <select name="tutorEditar" class="form-control">
                    <?php 
                    $r = Datos::allFromTable("profull");
                    foreach ($r as $dato):
                      if($dato['rol'] == 2){ ?>
                        <option value="<?php echo $dato['numero']; ?>" <?php if($dato['numero'] == $alumno['tutor'])  echo 'selected'; ?>> <?php echo $dato['nombre'] ?> </option>
                    <?php 
                    } endforeach; ?>
                  </select>
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
        <!--***********************TERMINA COLUMNA*****************************-->
    <!--/section-->
  </div>
    <!-- /.content -->
<?php
    //Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
    $registro = new MvcController();

    //se invoca la funcion registrousuariocontroller de la clase mvccontroller;
    $registro -> editarAlumnoController();
?>