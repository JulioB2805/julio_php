<?php 
    // ======================
    //HERENCIA
    // ======================
    // Una clase puede heredar propiedades y metodos de otra clase
    // usa "extends" para heredar

    class Animal {
        public $nombre;

        public function comer(){
            return"{$this->nombre} esta comiendo";
        }
    }

    //Perro hereda todo de animal y agrega sus propios metodos
    class Perro extends Animal {
        public function ladrar (){
            return"{$this->nombre} dice: ¡Guau guau!";
        }
    }

    $perro = new Perro();
    $perro->nombre="Max";
    echo $perro ->comer() . "\n";    //metodo heredado de Animal
    echo $perro->ladrar();           // metodo propio de perro
?>