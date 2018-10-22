<?php

	class Paginas{


		public function enlacesPaginasModel($enlacesModel){
			if($enlacesModel == "registroAlumno" || $enlacesModel == "registroMaestro"
				|| $enlacesModel == "registroTutor" || $enlacesModel == "asignarTutor"
				|| $enlacesModel == "perfilProfe" || $enlacesModel == "salir"
				|| $enlacesModel == "listaAlumno" || $enlacesModel == "listaProfe"
				|| $enlacesModel == "listaTutor" || $enlacesModel == "editarTutor"
				|| $enlacesModel == "editarMaestro" || $enlacesModel == "editarAlumno"
				|| $enlacesModel == "eliminarProfe" || $enlacesModel == "listaTutoria"
				|| $enlacesModel == "registroTutoria"){

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