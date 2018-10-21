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
        $stmt = Conexion::conectar()->prepare("CALL $tabla (:nombre,:carrera,:rol,:correo,:password)");
        //Se cambian los valores ocultos con los valores reales
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datosModel["rol"], PDO::PARAM_STR);
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

    #Registro de tutorias
    public function registroTutorModel($datosModel, $tabla){
    	//Se llama a la clase Conexion y al su método conectar que regresa un pdo y se prepara la instrucción INSERT 
        $stmt = Conexion::conectar()->prepare("CALL $tabla (:nombre,:carrera,:rol,:correo,:password)");
        //Se cambian los valores ocultos con los valores reales
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datosModel["rol"], PDO::PARAM_STR);
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
}