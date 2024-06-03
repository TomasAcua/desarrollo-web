<?php
// Incluir las clases y la lógica de TestClinica
require_once "Medico.php";
require_once "Paciente.php";
require_once "Estudio.php";
require_once "TestClinica.php";

// Conectar a la base de datos (reemplaza estos valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = ""; // Contraseña de tu base de datos
$database = "bdclinica";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear una instancia de TestClinica y pasar la conexión a la base de datos
$clinica = new TestClinica($conn);

// Aquí puedes manejar las solicitudes del usuario y llamar a las operaciones correspondientes
// Por ejemplo:

// Ingresar un nuevo paciente
$paciente = new Paciente(null, "Juan Perez", "12345");
$clinica->ingresarPaciente($paciente);

// Actualizar datos de un paciente existente
$pacienteActualizar = new Paciente(1, "Carlos Gomez", "67890");
$clinica->actualizarPaciente($pacienteActualizar);

// Eliminar un paciente existente
$clinica->eliminarPaciente(2);

// Ingresar un nuevo médico
$medico = new Medico(null, "Dr. Martínez", "Cardiología");
$clinica->ingresarMedico($medico);

// Actualizar datos de un médico existente
$medicoActualizar = new Medico(1, "Dr. Rodríguez", "Pediatría");
$clinica->actualizarMedico($medicoActualizar);

// Eliminar un médico existente
$clinica->eliminarMedico(2);

// Incorporar un estudio a la historia clínica de un paciente
$estudio = new Estudio(null, "2024-06-01", "Radiografía de tórax", 1, 1);
$clinica->incorporarEstudio($estudio);

// Visualizar todos los estudios de un paciente
$clinica->visualizarEstudiosPaciente(1);

// Cerrar la conexión a la base de datos al finalizar
$conn->close();
?>

