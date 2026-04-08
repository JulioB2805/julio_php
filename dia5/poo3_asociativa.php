<?php

    // =====================
    // ASOCIACION
    // =====================
    // Relacion donde dos objetos se conocen pero existen independientemente
    // Ninguno depende del otro para existir

    class Estudiante {
        public $nombre;

        public function _construct($nombre) {
            $this->nombre = $nombre;
        }
    }

    class Curso {
        public $nombreCurso;

        public function _construct($nombreCurso){
            $this->nombreCurso = $nombreCurso;
        }

        public function inscribir($estudiante){
            return "{$estudiante->nombre} se inscribio en {$this->nombreCurso}";
        }
    }

    // Ambos objetos existen independientemente
    $estudiante = new Estudiante("Maria");
    $curso = new Curso ("Matematicas");

    //Se relacionan temporalmente
    echo $curso->inscribir($estudiante);

?>