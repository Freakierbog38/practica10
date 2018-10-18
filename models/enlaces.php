<?php

	class Paginas{


		public function enlacesPaginasModel($enlacesModel){
			if($enlacesModel == "registroAlumno" || $enlacesModel == "registroMaestro"
				|| $enlacesModel == "registroTutor" || $enlacesModel == "asignarTutor"){

				$module = "views/module/" . $enlacesModel .".php";
			}
			else if ($enlacesModel == "index") {
				$module = "views/module/inicio.php";
			}

			return $module;

		}
	}



?>