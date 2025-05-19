<?php
// Esto le dice al navegador que el contenido que se va a devolver es JSON
header('Content-Type: application/json');
// Mostrar errores en el navegador
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener el parámetro tipo desde la URL
$tipo = $_GET['tipo'];

// Preparar la respuesta
switch ($tipo) {
    case '1':
        $respuesta = "Good Day";
        break;
    case '2':
        $respuesta = "Bad Day";
        break;
    default:
        $respuesta = "Mensaje por defecto o tipo desconocido";
        break;
}

// Enviar la respuesta como JSON
echo json_encode($respuesta);
?>