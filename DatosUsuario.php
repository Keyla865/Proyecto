<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$Correo = $_SESSION['Correo'];  

$sql = "SELECT * FROM registro WHERE Correo = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en la preparación del statement SQL: " . $conn->error);
}

$stmt->bind_param("s", $Correo);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    // Imprimir los datos del usuario
    echo "<h2>Datos del Usuario</h2>";
    echo "<p><strong>Nombre:</strong> " . $user_data['Nombre'] . "</p>";
    echo "<p><strong>País:</strong> " . $user_data['Pais'] . "</p>";
    echo "<p><strong>Ciudad:</strong> " . $user_data['Ciudad'] . "</p>";
    echo "<p><strong>Código Postal:</strong> " . $user_data['CP'] . "</p>";
    echo "<p><strong>Correo Electrónico:</strong> " . $user_data['Correo'] . "</p>";
} else {
    echo "Error al obtener datos del usuario: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
