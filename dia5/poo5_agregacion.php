<?php 

   // ============================
    // AGREGACION
    // ============================
    //Relacion debil : una clase usa otra clase
    // Los objetos pueden existir independientemente
    //"Los empleados pueden existir sin el departamento"

    class Empleado {
        public $nombre;

        public function _construct($nombre) {
            $this->nombre = $nombre;
        }
    }

    class Departamento {
        public $nombreDep;
        private $empleados= [];

        public function _construct($nombreDep){
            $this->nombreDep = $nombreDep;
        }

        public function agregarEmpleado($empleado){
            // El empleado ya existe, solo lo agregamos
            $this->empleados[]=$empleado;
        }

        public function listarEmpleados(){
            $lista = "Empleados de {$this->nombreDep}:\n";
            foreach ($this->empleados as $emp){
                $lista .= "-{$emp->nombre}\n";
            }
            return $lista;
        }
    }

    //Los empleados se crean independientemente
    $emp1 = new Empleado ("Carlos");
    $emp2 = new Empleado ("Ana");

    //Luego se agregan al departamento 
    $departamento = new Departamento("ventas");
    $departamento->agregarEmpleado($emp1);
    $departamento->agregarEmpleado($emp2);

    echo $departamento->listarEmpleados();

    //Los empleados siguen existiendo aunque se elimine el departamento

?>