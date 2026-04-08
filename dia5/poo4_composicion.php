<?php 

    //====================
    // COMPOSICION
    //====================
    // Relacion fuerte: Una clase CREA y POSEE otra clase 
    //Si se destruye el objeto contenedor,se destruye lo contenido
    //"El motor no puede existir sin el coche"

    class Motor {
        public function encender (){
            return "Motor encendido";
        }
    }

    class Coche {
        private $motor;

        public function _construct(){
            //El motor se crea Dentro del coche
            // No existe fuera del coche
            $this->motor = new Motor();
        }

        public function arrancar(){
            return $this->motor->encender();
        }
    }

    // Al crear el coche,automaticamente se crea su motor
    $coche = new Coche ();
     
    echo $coche->arrancar();

?>