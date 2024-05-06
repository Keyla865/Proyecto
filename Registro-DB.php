<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$Nombre = $_POST['Nombre'];
$Pais = $_POST['Pais'];
$Ciudad = $_POST['Ciudad'];
$CP = $_POST['CP'];
$Correo = $_POST['Correo'];
$Contrasena = $_POST['Contrasena'];

// Insertar datos en la base de datos
$sql = "INSERT INTO registro (nombre, pais, ciudad, cp, correo, contrasena)
VALUES ('$Nombre', '$Pais', '$Ciudad', '$CP', '$Correo', '$Contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
