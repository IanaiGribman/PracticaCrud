<?php
require_once 'DBconfing.php'; // para poder usar la conexión a la base de datos

header('Content-Type: application/json'); // Esto le dice al navegador que el contenido que se va a devolver es JSON
error_reporting(E_ALL); // Mostrar errores en el navegador
ini_set('display_errors', 1);

// Limpiar cualquier salida previa
ob_clean();

// Obtener el parámetro tipo desde la URL
$tipo = $_GET['tipo'];

/*
// Preparar la respuesta
switch ($tipo) {
    case '1':
        $persona = array("first_name"=>"Mateo", "last_name"=>"Voitina",'email'=>'mateo@mail.com', "birth_date"=>"2006-01-01");
        break;
    case '2':
        $persona = array("first_name"=>"Luciano", "last_name"=>"Arnedo",'email'=>'luciano@mail.com', "birth_date"=>"2011-04-02");
        break;
    default:
        $respuesta = array("Mensaje" => "Mensaje por defecto o tipo desconocido");
        break;
}*/
/*CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    birth_date DATE NOT NULL
) ENGINE=INNODB;*/

$sql = "SELECT first_name, last_name, email, birth_date FROM students WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $tipo);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $persona = $result->fetch_assoc(); // Obtener la primera fila del resultado
    } else {
        http_response_code(404); // No encontrado
        $persona = array("error" => "No se encontraron registros para el tipo especificado");
    }
} else {
    http_response_code(500); // Error interno del servidor
    $persona = array("error" => "Error al ejecutar la consulta: " . $stmt->error);
} 

// Enviar la respuesta como JSON
echo json_encode($persona);
?>