<?php

    // ===================================
    // CLASE SIMPLE
    //=====================================
    // Una clase es una plantilla para crear objetos
    // Define propiedades (variables)y metodos (funciones)

    class Persona {
        public $nombre;
        public $edad;

        public function saludar() {
            return"Hola, soy {$this->nombre} y tengo {$this->edad} años ";
        }
    }

    //crear un objeto (instancia) de la clase
    $persona = new Persona ();
    $persona->nombre="Julio";
    $persona->edad = 17 ;
    echo $persona->saludar();
?>