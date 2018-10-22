<?php

require_once("conexion.php");

class Datos extends Conexion{
        
    #Registro de usuarios
    public function registroAlumnoModel($datosModel, $tabla){
    	//Se llama a la clase Conexion y al su método conectar que regresa un pdo y se prepara la instrucción INSERT 
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(matricula,nombre,carrera,tutor) VALUES(:matricula,:nombre,:carrera,:tutor) ");
        //Se cambian los valores ocultos con los valores reales
        $stmt->bindParam(":matricula", $datosModel["matricula"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_STR);
        //Se ejecuta la instrucción, si es exitosa lo hace saber, si no hace saber que no lo fue
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        //Se cierra la conexión
        $stmt->close();
    }

    #Registro de profesores
    public function registroProfesorModel($datosModel, $tabla){
    	//Se llama a la clase Conexion y al su método conectar que regresa un pdo y se prepara la instrucción INSERT 
        $stmt = Conexion::conectar()->prepare("CALL $tabla (:nombre,:carrera,:rol,:correo,:password,:foto)");
        //Se cambian los valores ocultos con los valores reales
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datosModel["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datosModel["foto"], PDO::PARAM_STR);
        //Se ejecuta la instrucción, si es exitosa lo hace saber, si no hace saber que no lo fue
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        //Se cierra la conexión
        $stmt->close();
    }

    #Registro de tutorias
    public function registroTutorModel($datosModel, $tabla){
    	//Se llama a la clase Conexion y al su método conectar que regresa un pdo y se prepara la instrucción INSERT 
        $stmt = Conexion::conectar()->prepare("CALL $tabla (:nombre,:carrera,:rol,:correo,:password,:foto)");
        //Se cambian los valores ocultos con los valores reales
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datosModel["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datosModel["foto"], PDO::PARAM_STR);
        //Se ejecuta la instrucción, si es exitosa lo hace saber, si no hace saber que no lo fue
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        //Se cierra la conexión
        $stmt->close();
    }

    #Registrar una tutoria
    public function registroTutoriaModel($datosModel, $tabla){
    	//Se llama a la clase Conexion y al su método conectar que regresa un pdo y se prepara la instrucción INSERT 
        $stmt = Conexion::conectar()->prepare("CALL $tabla (:tutor,:tipo,:alumno,:tema,:obser,:fecha,:hora)");
        //Se cambian los valores ocultos con los valores reales
        $stmt->bindParam(":tutor", $datosModel["tutor"] , PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":alumno", $datosModel["alumno"], PDO::PARAM_STR);
        $stmt->bindParam(":tema", $datosModel["tema"], PDO::PARAM_STR);
        $stmt->bindParam(":obser", $datosModel["observaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
         //Se ejecuta la instrucción, si es exitosa lo hace saber, si no hace saber que no lo fue
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        //Se cierra la conexión
        $stmt->close();
    }

    #Editar un profesor
    public function editarProfeModel($datosModel, $tabla){
    	//Se llama a la clase Conexion y al su método conectar que regresa un pdo y se prepara la instrucción
        $stmt = Conexion::conectar()->prepare("CALL $tabla (:numero,:nombre,:carrera,:correo,:password)");
        $stmt->bindParam(":numero", $datosModel["numero"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        //Se ejecuta la instrucción, si es exitosa lo hace saber, si no hace saber que no lo fue
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        //Se cierra la conexión
        $stmt->close();
    }

    #Editar un alumno
    public function editarAlumnoModel($datosModel, $tabla){
    	//Se llama a la clase Conexion y al su método conectar que regresa un pdo y se prepara la instrucción
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, carrera=:carrera, tutor=:tutor WHERE matricula=:matricula");
        $stmt->bindParam(":matricula", $datosModel["matricula"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_STR);
        //Se ejecuta la instrucción, si es exitosa lo hace saber, si no hace saber que no lo fue
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        //Se cierra la conexión
        $stmt->close();
    }

    #Consulta de una tabla
    public function allFromTable($tabla){
    	//Se invoca la funcion conectar de la clase Conexion, para preparar la consulta
    	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    	//Si se logra la consulta regresa el resultado
    	if ($stmt->execute()) {
    		return $stmt;
    	}
    	else{
    		return[];
    	}
    	//Se cierra la conexion
    	$stmt->close();
    }

    #Consulta de un registro de una tabla
    public function unLoginModel($datosModel, $tabla){
    	//Se invoca la funcion conectar de la clase Conexion, para preparar la consulta
    	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :correo");
    	$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
    	//Si se logra la consulta regresa el resultado
    	if ($stmt->execute()) {
    		return $stmt->fetch();
    	}
    	else{
    		return[];
    	}
    	//Se cierra la conexion
    	$stmt->close();
    }

    #Trae la lista de alumnos
    public function alumnosModel($datosModel, $tabla){
    	//Se invoca la funcion conectar de la clase Conexion, para preparar la consulta
    	if($datosModel['rol'] < 2){
    		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    	} else{
    		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tutor = :tutor");
    		$stmt->bindParam(":tutor", $datosModel['numero'], PDO::PARAM_STR);
    	}
    	//Si se logra la consulta regresa el resultado
    	if ($stmt->execute()) {
    		return $stmt;
    	}
    	else{
    		return[];
    	}
    	//Se cierra la conexion
    	$stmt->close();
    }

    #Trae la lista de profesores
    public function profesModel($tabla){
    	//Se invoca la funcion conectar de la clase Conexion, para preparar la consulta
    	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rol = 2");
    	//Si se logra la consulta regresa el resultado
    	if ($stmt->execute()) {
    		return $stmt;
    	}
    	else{
    		return[];
    	}
    	//Se cierra la conexion
    	$stmt->close();
    }

    #Trae la lista de tutorias
    public function tutorModel($tabla){
    	//Se invoca la funcion conectar de la clase Conexion, para preparar la consulta
    	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rol = 1");
    	//Si se logra la consulta regresa el resultado
    	if ($stmt->execute()) {
    		return $stmt;
    	}
    	else{
    		return[];
    	}
    	//Se cierra la conexion
    	$stmt->close();
    }

    #Trae un registro de profesor
    public function unProfeModel($id, $tabla){
    	//Se invoca la funcion conectar de la clase Conexion, para preparar la consulta
    	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE numero = :numero");
    	$stmt->bindParam(":numero", $id, PDO::PARAM_STR);
    	//Si se logra la consulta regresa el resultado
    	if ($stmt->execute()) {
    		return $stmt->fetch();
    	}
    	else{
    		return[];
    	}
    	//Se cierra la conexion
    	$stmt->close();
    }

    #Trae los alumnos de un profesor
    public function unAlumnoModel($tutor, $tabla){
    	//Se invoca la funcion conectar de la clase Conexion, para preparar la consulta
    	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    	//$stmt->bindParam(":tutor", $tutor, PDO::PARAM_STR);
    	//Si se logra la consulta regresa el resultado
    	if ($stmt->execute()) {
    		return $stmt;
    	}
    	else{
    		return[];
    	}
    	//Se cierra la conexion
    	$stmt->close();
    }

    #Eliminar un registro de Profesor
    public function eliminarProfeModel($id, $tabla){
    	//Se invoca la funcion conectar de la clase Conexion, para preparar la consulta
    	$stmt = Conexion::conectar()->prepare("CALL $tabla (:numero)");
    	$stmt->bindParam(":numero", $id, PDO::PARAM_STR);
    	//Si se logra la consulta regresa el resultado
    	if ($stmt->execute()) {
    		return "success";
    	}
    	else{
    		return "error";
    	}
    	//Se cierra la conexion
    	$stmt->close();
    }
}