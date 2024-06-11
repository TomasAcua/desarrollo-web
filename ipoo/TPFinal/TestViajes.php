<?php

require_once "Empresa.php";
require_once "Viaje.php";
require_once "ResponsableV.php";
require_once "Pasajero.php";
require_once "Persona.php";

class TestViaje
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function menu()
    {
        echo "===== Menú TestViaje =====\n";
        echo "1. Ingresar información de empresa de viajes\n";
        echo "2. Modificar información de empresa de viajes\n";
        echo "3. Eliminar información de empresa de viajes\n";
        echo "4. Buscar información de empresa de viajes\n";
        echo "5. Ingresar información de un viaje\n";
        echo "6. Modificar información de un viaje\n";
        echo "7. Eliminar información de un viaje\n";
        echo "8. Buscar información de un viaje\n";
        echo "9. Salir\n";
        echo "Seleccione una opción: ";

        $opcion = (int)trim(fgets(STDIN));

        switch ($opcion) {
            case 1:
                $this->ingresarEmpresa();
                break;
            case 2:
                $this->modificarEmpresa();
                break;
            case 3:
                $this->eliminarEmpresa();
                break;
            case 4:
                $this->buscarEmpresa();
                break;
            case 5:
                $this->ingresarViaje();
                break;
            case 6:
                $this->modificarViaje();
                break;
            case 7:
                $this->eliminarViaje();
                break;
            case 8:
                $this->buscarViaje();
                break;
            case 9:
                echo "Saliendo del programa...\n";
                break;
            default:
                echo "Opción inválida. Inténtelo de nuevo.\n";
                $this->menu();
                break;
        }
    }

    public function ingresarEmpresa()
    {
        echo "Ingrese el nombre de la empresa: ";
        $nombre = trim(fgets(STDIN));
        echo "Ingrese la dirección de la empresa: ";
        $direccion = trim(fgets(STDIN));

        // Validación de la entrada
        if ($nombre && $direccion) {
            $empresa = new Empresa($this->conexion, $nombre, $direccion);
            $empresa->insertar();
        } else {
            echo "Nombre y dirección de empresa son obligatorios.\n";
        }
    }

    public function modificarEmpresa()
    {
        echo "Ingrese el ID de la empresa a modificar: ";
        $id = trim(fgets(STDIN));

        // Validar si la empresa existe antes de modificarla
        $empresa = Empresa::buscar($this->conexion, $id);
        if (!$empresa) {
            echo "La empresa con ID $id no existe.\n";
            return;
        }

        echo "Ingrese el nuevo nombre de la empresa: ";
        $nombre = trim(fgets(STDIN));
        echo "Ingrese la nueva dirección de la empresa: ";
        $direccion = trim(fgets(STDIN));

        // Validación de la entrada
        if ($nombre && $direccion) {
            $empresa->setNombre($nombre);
            $empresa->setDireccion($direccion);

            $empresa->actualizar($id);
        } else {
            echo "Nombre y dirección de empresa son obligatorios.\n";
        }
    }

    public function eliminarEmpresa()
    {
        echo "Ingrese el ID de la empresa a eliminar: ";
        $id = trim(fgets(STDIN));

        // Validar si la empresa existe antes de eliminarla
        $empresa = Empresa::buscar($this->conexion, $id);
        if (!$empresa) {
            echo "La empresa con ID $id no existe.\n";
            return;
        }

        $empresa->eliminar($id);
    }
    public function buscarEmpresa()
{
    echo "Ingrese el ID de la empresa a buscar: ";
    $id = trim(fgets(STDIN));

    $empresa = Empresa::buscar($this->conexion, $id);
    if ($empresa) {
        echo "Información de la empresa:\n";
        echo "ID: " . $id . "\n";
        echo "Nombre: " . $empresa->getNombre() . "\n";
        echo "Dirección: " . $empresa->getDireccion() . "\n";
    } else {
        echo "No se encontró ninguna empresa con ese ID.\n";
    }
}
    

    public function ingresarViaje()
    {
        echo "Ingrese el destino del viaje: ";
        $destino = trim(fgets(STDIN));
        echo "Ingrese la cantidad máxima de pasajeros: ";
        $cantMaxPasajeros = trim(fgets(STDIN));
        echo "Ingrese el ID de la empresa: ";
        $idEmpresa = trim(fgets(STDIN));
        echo "Ingrese el número de empleado: ";
        $numEmpleado = trim(fgets(STDIN));
        echo "Ingrese el importe del viaje: ";
        $importe = trim(fgets(STDIN));

        // Validación de la entrada
        if ($destino && $cantMaxPasajeros && $idEmpresa && $numEmpleado && $importe) {
            $viaje = new Viaje($this->conexion, $destino, $cantMaxPasajeros, $idEmpresa, $numEmpleado, $importe);
            $viaje->insertar();
        } else {
            echo "Todos los campos son obligatorios.\n";
        }
    }

    public function modificarViaje()
    {
        echo "Ingrese el ID del viaje a modificar: ";
        $id = trim(fgets(STDIN));

        // Validar si el viaje existe antes de modificarlo
        $viaje = Viaje::buscar($this->conexion, $id);
        if (!$viaje) {
            echo "El viaje con ID $id no existe.\n";
            return;
        }

        echo "Ingrese el nuevo destino del viaje: ";
        $destino = trim(fgets(STDIN));
        echo "Ingrese la nueva cantidad máxima de pasajeros: ";
        $cantMaxPasajeros = trim(fgets(STDIN));
        echo "Ingrese el nuevo ID de la empresa: ";
        $idEmpresa = trim(fgets(STDIN));
        echo "Ingrese el nuevo número de empleado: ";
        $numEmpleado = trim(fgets(STDIN));
        echo "Ingrese el nuevo importe del viaje: ";
        $importe = trim(fgets(STDIN));

        // Validación de la entrada
        if ($destino && $cantMaxPasajeros && $idEmpresa && $numEmpleado && $importe) {
            $viaje->setDestino($destino);
            $viaje->setCantMaxPasajeros($cantMaxPasajeros);
            $viaje->setIdEmpresa($idEmpresa);
            $viaje->setNumEmpleado($numEmpleado);
            $viaje->setImporte($importe);

            $viaje->actualizar($id);
        } else {
            echo "Todos los campos son obligatorios.\n";
        }
    }

    public function eliminarViaje()
    {
        echo "Ingrese el ID del viaje a eliminar: ";
        $id = trim(fgets(STDIN));

        // Validar si el viaje existe antes de eliminarlo
        $viaje = Viaje::buscar($this->conexion, $id);
        if (!$viaje) {
            echo "El viaje con ID $id no existe.\n";
            return;
        }

        $viaje->eliminar($id);
    }
    public function buscarViaje()
    {
        echo "Ingrese el ID del viaje a buscar: ";
        $id = trim(fgets(STDIN));

        $viaje = Viaje::buscar($this->conexion, $id);
        if ($viaje) {
            echo "Información del viaje:\n";
            echo "ID: " . $viaje['idviaje'] . "\n";
            echo "Destino: " . $viaje['vdestino'] . "\n";
            echo "Cant. Máx. Pasajeros: " . $viaje['vcantmaxpasajeros'] . "\n";
            echo "ID Empresa: " . $viaje['idempresa'] . "\n";
            echo "Número Empleado: " . $viaje['rnumeroempleado'] . "\n";
            echo "Importe: " . $viaje['vimporte'] . "\n";
        } else {
            echo "No se encontró ningún viaje con ese ID.\n";
        }
    }
}

// Ejemplo de uso
$conexion = new mysqli("localhost", "root", "", "bdviajes");
$testViaje = new TestViaje($conexion);
// Creamos algunos empleados
$empleado1 = new ResponsableV("Juan", "Pérez", 1001, 123456);
$empleado2 = new ResponsableV("María", "García", 1002, 789012);
$empleado3 = new ResponsableV("Carlos", "López", 1003, 345678);

// Insertamos los empleados en la base de datos
$empleado1->insertar($conexion);
$empleado2->insertar($conexion);
$empleado3->insertar($conexion);

// Creamos algunos pasajeros
$pasajero1 = new Pasajero($conexion, "Laura", "Gómez", "123ABC", "555-1234");
$pasajero2 = new Pasajero($conexion, "Pedro", "Martínez", "456DEF", "555-5678");
$pasajero3 = new Pasajero($conexion, "Ana", "Rodríguez", "789GHI", "555-9012");

// Insertamos los pasajeros en la base de datos
$pasajero1->insertar($conexion);
$pasajero2->insertar($conexion);
$pasajero3->insertar($conexion);

$testViaje->menu();
