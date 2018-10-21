<?php

	class Paginas{


		public function enlacesPaginasModel($enlacesModel){
			if($enlacesModel == "registroAlumno" || $enlacesModel == "registroMaestro"
				|| $enlacesModel == "registroTutor" || $enlacesModel == "asignarTutor"
				|| $enlacesModel == "perfilProfe" || $enlacesModel == "salir"){

				$module = "views/module/" . $enlacesModel .".php";
			}
			else if ($enlacesModel == "index") {
				$module = "views/module/inicio.php";
			}
			else if ($enlacesModel == "okA") {
				$module = "views/module/registroAlumno.php";
			}
			else if ($enlacesModel == "okP") {
				$module = "views/module/registroMaestro.php";
			}
			else if ($enlacesModel == "okT") {
				$module = "views/module/registroTutor.php";
			}

			return $module;

		}
	}



?>