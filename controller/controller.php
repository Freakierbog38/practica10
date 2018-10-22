<?php

	class MvcController{
    	//Llamar a la plantilla
    	public function pagina(){
        	//Include se utiliza para invocar el arhivo que contiene el codigo HTML
        	include "views/template.php";
    	}

	

	//Interacción con el usuario
    public function enlacesPaginasController(){
        //Trabajar con los enlaces de las páginas
        //Validamos si la variable "action" viene vacia, es decir cuando se abre la pagina por primera vez se debe cargar la vista index.php

        if(isset($_GET['action'])){
            //guardar el valor de la variable action en views/modules/navegacion.php en el cual se recibe mediante el metodo get esa variable
            $enlaces = $_GET['action'];
        }else{
            //Si viene vacio inicializo con index
            $enlaces = "index";
        }

        //Mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros, etc.
        //Para esto hay que mandar al modelo para que haga dicho proceso y muestre la informacions

        $respuesta = Paginas::enlacesPaginasModel($enlaces);

        include $respuesta;
    }

    public function registroAlumnoController(){
        if(isset($_POST["matriculaRegistro"])){
            //Recibe todas las variables mediante POST y las asigna a un array asociado
            $datosController = array("matricula" => $_POST["matriculaRegistro"],
                                     "nombre" => $_POST["nombreRegistro"],
                                     "carrera" => $_POST["carreraRegistro"],
                                     "tutor" => $_POST["tutorRegistro"]);
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registroAlumnoModel($datosController, "alumno");

            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=okA");
            }
            else{
                header("location:index.php");
            }
        }
    }

    public function registroProfesorController(){
        if(isset($_POST["nombreRegistro"])){
            //Se extrae el nombre del archivo que se subió
            //$nombreArchivo = basename($_FILES['fotoRegistro']['name']);
            //Del nombre se extrae la extensión
            //$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            //Se checa si hubo algun archivo
            //if($extension == NULL || $extension == '')
                //Se reemplaza el nombre por la matricula conservando su extensión
                //$nombreArchivo = $nombreArchivo;
            //else
                //Si no hay nada se usa la imagen predeterminada
                $nombreArchivo = "user.png";
            //Recibe todas las variables mediante POST y las asigna a un array asociado
            $datosController = array("nombre" => $_POST["nombreRegistro"],
                                     "carrera" => $_POST["carreraRegistro"],
                                     "correo" => $_POST["correoRegistro"],
                                     "password" => $_POST["passwordRegistro"],
                                     "rol" => $_POST["rolRegistro"],
                                     "foto" => $nombreArchivo);
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registroProfesorModel($datosController, "pushProfe");

            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                //Si el registro fue exitoso se mueve la imagen a la carpeta, sólo soi se envió una imagen
                //if(isset($extension))
                    //move_uploaded_file($_FILES['fotoRegistro']['tmp_name'], 'img/' . $nombreArchivo);
                header("location:index.php?action=okP");
            }
            else{
                header("location:index.php");
            }
        }
    }

    public function registroTutorController(){
        if(isset($_POST["nombreRegistro"])){
            //Se extrae el nombre del archivo que se subió
            //$nombreArchivo = basename($_FILES['fotoRegistro']['name']);
            //Del nombre se extrae la extensión
            //$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            //Se checa si hubo algun archivo
            //if($extension == NULL || $extension == '')
                //Si no hay nada se usa la imagen predeterminada
                $nombreArchivo = "user.png";
            //else
                //Se reemplaza el nombre por la matricula conservando su extensión
                //$nombreArchivo = $nombreArchivo;
            //Recibe todas las variables mediante POST y las asigna a un array asociado
            $datosController = array("nombre" => $_POST["nombreRegistro"],
                                     "correo" => $_POST["correoRegistro"],
                                     "password" => $_POST["passwordRegistro"],
                                     "carrera" => $_POST["carreraRegistro"],
                                     "rol" => $_POST["rolRegistro"],
                                     "foto" => $nombreArchivo);
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registroProfesorModel($datosController, "pushProfe");

            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                //Si el registro fue exitoso se mueve la imagen a la carpeta, sólo soi se envió una imagen
                //if(isset($extension))
                    //move_uploaded_file($_FILES['fotoRegistro']['tmp_name'], 'img/' . $nombreArchivo);
                header("location:index.php?action=okT");
            }
            else{
                header("location:index.php");
            }
        }
    }

    public function registroTutoriaController(){
        if(isset($_POST["nombreRegistro"])){
            //Recibe todas las variables mediante POST y las asigna a un array asociado
            $datosController = array("tutor" => $_POST["tutorRegistro"],
                                     "tipo" => $_POST["tipoRegistro"],
                                     "alumno" => $_POST["alumnoRegistro"],
                                     "tema" => $_POST["temaRegistro"],
                                     "observaciones" => $_POST["obseRegistro"],
                                     "fecha" => date("Y-m-d"),
                                     "hora" => date("H:i:s"));
            $respuesta = Datos::registroTutoriaModel($datosController, "tutoriaIndi");
            if($respuesta == "success"){
                header("location: index.php?action=listaTutoria");
            }
            else{
                header("location: index.php");
            }
        }
    }

    public function editarTutorController($id){
        if(isset($_POST["nombreEditar"])){
            //Se extrae el nombre del archivo que se subió
            //$nombreArchivo = basename($_FILES['fotoEditar']['name']);
            //Del nombre se extrae la extensión
            //$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            //Se checa si hubo algun archivo
            //if($extension == NULL || $extension == '')
                //Si no hay nada se usa la imagen predeterminada
            $nombreArchivo = "user.jpg";
            //else
                //Se reemplaza el nombre por la matricula conservando su extensión
                //$nombreArchivo = $nombreArchivo;
            //Recibe todas las variables mediante POST y las asigna a un array asociado
            $datosController = array("numero" => $id,
                                     "nombre" => $_POST["nombreEditar"],
                                     "correo" => $_POST["correoEditar"],
                                     "password" => $_POST["passwordEditar"],
                                     "carrera" => $_POST["carreraEditar"],
                                     "rol" => $_POST["rolEditar"],
                                     "foto" => $nombreArchivo);
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::editarProfeModel($datosController, "editProfe");

            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                //Si el registro fue exitoso se mueve la imagen a la carpeta, sólo soi se envió una imagen
                //if(isset($extension))
                    //move_uploaded_file($_FILES['fotoRegistro']['tmp_name'], 'img/' . $nombreArchivo);
                header("location:index.php?action=listaTutor");
            }
            else{
                header("location:index.php");
            }
        }
    }

    public function editarProfeController($id){
        if(isset($_POST["nombreEditar"])){
            //Se extrae el nombre del archivo que se subió
            //$nombreArchivo = basename($_FILES['fotoEditar']['name']);
            //Del nombre se extrae la extensión
            //$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            //Se checa si hubo algun archivo
            //if($extension == NULL || $extension == '')
                //Si no hay nada se usa la imagen predeterminada
            $nombreArchivo = "user.jpg";
            //else
                //Se reemplaza el nombre por la matricula conservando su extensión
                //$nombreArchivo = $nombreArchivo;
            //Recibe todas las variables mediante POST y las asigna a un array asociado
            $datosController = array("numero" => $id,
                                     "nombre" => $_POST["nombreEditar"],
                                     "correo" => $_POST["correoEditar"],
                                     "password" => $_POST["passwordEditar"],
                                     "carrera" => $_POST["carreraEditar"],
                                     "rol" => $_POST["rolEditar"],
                                     "foto" => $nombreArchivo);
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::editarProfeModel($datosController, "editProfe");

            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                //Si el registro fue exitoso se mueve la imagen a la carpeta, sólo soi se envió una imagen
                //if(isset($extension))
                    //move_uploaded_file($_FILES['fotoRegistro']['tmp_name'], 'img/' . $nombreArchivo);
                header("location:index.php?action=listaProfe");
            }
            else{
                header("location:index.php");
            }
        }
    }

    public function editarAlumnoController(){
        if(isset($_POST["matriculaEditar"])){
            //Recibe todas las variables mediante POST y las asigna a un array asociado
            $datosController = array("matricula" => $_POST["matriculaEditar"],
                                     "nombre" => $_POST["nombreEditar"],
                                     "carrera" => $_POST["carreraEditar"],
                                     "tutor" => $_POST["tutorEditar"]);
            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::editarAlumnoModel($datosController, "alumno");

            header("Location: index.php?action=listaAlumno");
        }
    }

    public function loginController(){
        if(isset($_POST['passwordLogin'])){
            //Recibe todas las variables mediante POST y las asigna a un array asociado
            $datosController = array("correo" => $_POST["emailLogin"],
                                     "password" => $_POST["passwordLogin"]);

            $respuesta = Datos::unLoginModel($datosController, "profull");

            if($respuesta){
                if($datosController['password'] == $respuesta['password']){
                    session_start();
                    $_SESSION['usuario_id'] = $respuesta['numero'];
                    $_SESSION['usuario_nombre'] = $respuesta['nombre'];
                    $_SESSION['usuario_email'] = $respuesta['correo'];
                    $_SESSION['usuario_password'] = $respuesta['password'];
                    $_SESSION['usuario_carrera'] = $respuesta['carrera'];
                    $_SESSION['usuario_rol'] = $respuesta['rol'];
                    $_SESSION['usuario_foto'] = $respuesta['foto'];
                    header("location:index.php");
                }
                else{
                    header("location:login.php");
                }
            }
            else{
                header("location:login.php");
            }
        }
    }

    public function eliminarProfeController($id){
        if(isset($_POST['passConf'])){
            if($_POST['passConf'] == $_SESSION['usuario_password']){
                $respuesta = Datos::eliminarProfeModel($id, "poProfe");
                if($respuesta="success")
                    header("Location: index.php?action=listaProfe");
                else
                    header("Location: index.php");
            }
            else{
                return "Incorrecta";
            }
        }
    }

}