<?php

$host = "localhost";
$user = "test_user_ianai";
$password = "12345";
$database = "test_bd_ianai";

$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["error" => "Database connection failed"]));
}
else {
    http_response_code(200);
    // Optionally, you can return a success message or status
    echo json_encode(["message" => "Database connection successful"]);
}
?>