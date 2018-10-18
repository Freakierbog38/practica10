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

}

?>