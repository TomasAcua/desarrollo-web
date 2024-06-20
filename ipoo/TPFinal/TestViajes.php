<?php
require_once "Empresa.php";
require_once "Viaje.php";
require_once "Pasajero.php";
require_once "ResponsableV.php";

class TestViaje {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function mostrarMenuPrincipal() {
        do {
            echo "===== Menú Principal =====\n";
            echo "1. Gestionar Empresa\n";
            echo "2. Gestionar Viaje\n";
            echo "3. Gestionar Pasajero\n";
            echo "4. Gestionar Responsable\n";
            echo "0. Salir\n";
            echo "Seleccione una opción: ";
            $opcion = (int)trim(fgets(STDIN));

            switch ($opcion) {
                case 1:
                    $this->menuEmpresa();
                    break;
                case 2:
                    $this->menuViaje();
                    break;
                case 3:
                    $this->menuPasajero();
                    break;
                case 4:
                    $this->menuResponsable();
                    break;
                case 0:
                    echo "Saliendo del programa...\n";
                    exit();
                default:
                    echo "Opción no válida\n";
            }
        } while ($opcion != 0);
    }

    private function menuEmpresa() {
        echo "===== Gestión de Empresa =====\n";
        echo "1. Crear Empresa\n";
        echo "2. Actualizar Empresa\n";
        echo "3. Eliminar Empresa\n";
        echo "4. Buscar Empresa\n";
        echo "0. Volver al Menú Principal\n";
        echo "Seleccione una opción: ";
        $opcion = trim(fgets(STDIN));

        switch ($opcion) {
            case 1:
                echo "Nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Dirección: ";
                $direccion = trim(fgets(STDIN));
                $empresa = new Empresa($this->conexion, $nombre, $direccion);
                $empresa->insertar();
                break;
            case 2:
                echo "ID de la Empresa a actualizar: ";
                $id = trim(fgets(STDIN));
                $empresa = Empresa::buscar($this->conexion, $id);
                if ($empresa) {
                    echo "Nuevo Nombre: ";
                    $nombre = trim(fgets(STDIN));
                    echo "Nueva Dirección: ";
                    $direccion = trim(fgets(STDIN));
                    $empresa->setEnombre($nombre);
                    $empresa->setEdireccion($direccion);
                    $empresa->actualizar($id);
                }
                break;
            case 3:
                echo "ID de la Empresa a eliminar: ";
                $id = trim(fgets(STDIN));
                $empresa = Empresa::buscar($this->conexion, $id);
                if ($empresa) {
                    $empresa->eliminar($id);
                }
                break;
            case 4:
                echo "ID de la Empresa a buscar: ";
                $id = trim(fgets(STDIN));
                $empresa = Empresa::buscar($this->conexion, $id);
                if ($empresa) {
                    echo "Nombre: " . $empresa->getEnombre() . "\n";
                    echo "Dirección: " . $empresa->getEdireccion() . "\n";
                }
                break;
            case 0:
                return;
            default:
                echo "Opción no válida\n";
        }
    }

    private function menuViaje() {
        echo "===== Gestión de Viaje =====\n";
        echo "1. Crear Viaje\n";
        echo "2. Actualizar Viaje\n";
        echo "3. Eliminar Viaje\n";
        echo "4. Buscar Viaje\n";
        echo "0. Volver al Menú Principal\n";
        echo "Seleccione una opción: ";
        $opcion = trim(fgets(STDIN));

        switch ($opcion) {
            case 1:
                echo "Destino: ";
                $destino = trim(fgets(STDIN));
                echo "Cantidad Máxima de Pasajeros: ";
                $cantMaxPasajeros = trim(fgets(STDIN));
                echo "ID de la Empresa: ";
                $idEmpresa = trim(fgets(STDIN));
                echo "ID del Responsable: ";
                $idResponsable = trim(fgets(STDIN));
                echo "Importe: ";
                $importe = trim(fgets(STDIN));
                $viaje = new Viaje($this->conexion, $destino, $cantMaxPasajeros, $idEmpresa, $idResponsable, $importe);
                $viaje->insertar();
                break;
            case 2:
                echo "ID del Viaje a actualizar: ";
                $id = trim(fgets(STDIN));
                $viaje = Viaje::buscar($this->conexion, $id);
                if ($viaje) {
                    echo "Nuevo Destino: ";
                    $destino = trim(fgets(STDIN));
                    echo "Nueva Cantidad Máxima de Pasajeros: ";
                    $cantMaxPasajeros = trim(fgets(STDIN));
                    echo "Nuevo ID de la Empresa: ";
                    $idEmpresa = trim(fgets(STDIN));
                    echo "Nuevo ID del Responsable: ";
                    $idResponsable = trim(fgets(STDIN));
                    echo "Nuevo Importe: ";
                    $importe = trim(fgets(STDIN));
                    $viaje->setDestino($destino);
                    $viaje->setCantMaxPasajeros($cantMaxPasajeros);
                    $viaje->setIdEmpresa($idEmpresa);
                    $viaje->setIdResponsable($idResponsable);
                    $viaje->setImporte($importe);
                    $viaje->actualizar($id);
                }
                break;
            case 3:
                echo "ID del Viaje a eliminar: ";
                $id = trim(fgets(STDIN));
                $viaje = Viaje::buscar($this->conexion, $id);
                if ($viaje) {
                    $viaje->eliminar($id);
                }
                break;
            case 4:
                echo "ID del Viaje a buscar: ";
                $id = trim(fgets(STDIN));
                $viaje = Viaje::buscar($this->conexion, $id);
                if ($viaje) {
                    echo "Destino: " . $viaje['destino'] . "\n";
                    echo "Cantidad Máxima de Pasajeros: " . $viaje['cantMaxPasajeros'] . "\n";
                    echo "ID de la Empresa: " . $viaje['idempresa'] . "\n";
                    echo "ID del Responsable: " . $viaje['idresponsable'] . "\n";
                    echo "Importe: " . $viaje['importe'] . "\n";
                }
                break;
            case 0:
                return;
            default:
                echo "Opción no válida\n";
        }
    }

    private function menuPasajero() {
        echo "===== Gestión de Pasajero =====\n";
        echo "1. Crear Pasajero\n";
        echo "2. Actualizar Pasajero\n";
        echo "3. Eliminar Pasajero\n";
        echo "4. Buscar Pasajero\n";
        echo "0. Volver al Menú Principal\n";
        echo "Seleccione una opción: ";
        $opcion = trim(fgets(STDIN));

        switch ($opcion) {
            case 1:
                echo "Nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Documento: ";
                $documento = trim(fgets(STDIN));
                echo "Teléfono: ";
                $telefono = trim(fgets(STDIN));
                echo "ID del Viaje: ";
                $idViaje = trim(fgets(STDIN));
                $pasajero = new Pasajero(null, $nombre, $apellido, $documento, $telefono, null, $idViaje);
                $pasajero->insertar($this->conexion);
                break;
            case 2:
                echo "ID del Pasajero a actualizar: ";
                $idPasajero = trim(fgets(STDIN));
                $pasajero = Pasajero::buscar($this->conexion, $idPasajero);
                if ($pasajero) {
                    echo "Nuevo Nombre: ";
                    $nombre = trim(fgets(STDIN));
                    echo "Nuevo Apellido: ";
                    $apellido = trim(fgets(STDIN));
                    echo "Nuevo Documento: ";
                    $documento = trim(fgets(STDIN));
                    echo "Nuevo Teléfono: ";
                    $telefono = trim(fgets(STDIN));
                    echo "Nuevo ID del Viaje: ";
                    $idViaje = trim(fgets(STDIN));
                    $pasajero->setNombre($nombre);
                    $pasajero->setApellido($apellido);
                    $pasajero->setDocumento($documento);
                    $pasajero->setTelefono($telefono);
                    $pasajero->setIdViaje($idViaje);
                    $pasajero->actualizar($this->conexion);
                }
                break;
            case 3:
                echo "ID del Pasajero a eliminar: ";
                $idPasajero = trim(fgets(STDIN));
                $pasajero = Pasajero::buscar($this->conexion, $idPasajero);
                if ($pasajero) {
                    $pasajero->eliminar($this->conexion);
                }
                break;
            case 4:
                echo "ID del Pasajero a buscar: ";
                $idPasajero = trim(fgets(STDIN));
                $pasajero = Pasajero::buscar($this->conexion, $idPasajero);
                if ($pasajero) {
                    echo "Nombre: " . $pasajero['nombre'] . "\n";
                    echo "Apellido: " . $pasajero['apellido'] . "\n";
                    echo "Documento: " . $pasajero['documento'] . "\n";
                    echo "Teléfono: " . $pasajero['telefono'] . "\n";
                    echo "ID del Viaje: " . $pasajero['idviaje'] . "\n";
                }
                break;
            case 0:
                return;
            default:
                echo "Opción no válida\n";
        }
    }

    private function menuResponsable() {
        echo "===== Gestión de Responsable =====\n";
        echo "1. Crear Responsable\n";
        echo "2. Actualizar Responsable\n";
        echo "3. Eliminar Responsable\n";
        echo "4. Buscar Responsable\n";
        echo "0. Volver al Menú Principal\n";
        echo "Seleccione una opción: ";
        $opcion = trim(fgets(STDIN));

        switch ($opcion) {
            case 1:
                echo "Nombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Número de Licencia: ";
                $numLicencia = trim(fgets(STDIN));
                $responsable = new ResponsableV(null, $nombre, $apellido, $numLicencia, null);
                $responsable->insertar($this->conexion);
                break;
            case 2:
                echo "ID del Responsable a actualizar: ";
                $idResponsable = trim(fgets(STDIN));
                $responsable = ResponsableV::buscar($this->conexion, $idResponsable);
                if ($responsable) {
                    echo "Nuevo Nombre: ";
                    $nombre = trim(fgets(STDIN));
                    echo "Nuevo Apellido: ";
                    $apellido = trim(fgets(STDIN));
                    echo "Nuevo Número de Licencia: ";
                    $numLicencia = trim(fgets(STDIN));
                    $responsable->setNombre($nombre);
                    $responsable->setApellido($apellido);
                    $responsable->setNumeroLicencia($numLicencia);
                    $responsable->actualizar($this->conexion);
                }
                break;
            case 3:
                echo "ID del Responsable a eliminar: ";
                $idResponsable = trim(fgets(STDIN));
                $responsable = ResponsableV::buscar($this->conexion, $idResponsable);
                if ($responsable) {
                    $responsable->eliminar($this->conexion);
                }
                break;
            case 4:
                echo "ID del Responsable a buscar: ";
                $idResponsable = trim(fgets(STDIN));
                $responsable = ResponsableV::buscar($this->conexion, $idResponsable);
                if ($responsable) {
                    echo "Nombre: " . $responsable['nombre'] . "\n";
                    echo "Apellido: " . $responsable['apellido'] . "\n";
                    echo "Número de Licencia: " . $responsable['numLicencia'] . "\n";
                }
                break;
            case 0:
                return;
            default:
                echo "Opción no válida\n";
        }
    }
}

// Uso de la clase TestViaje
$conexion = new mysqli("localhost", "root", "", "bdviajes");
$testViaje = new TestViaje($conexion);
$testViaje->mostrarMenuPrincipal();
