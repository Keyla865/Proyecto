<?php
session_start();

if (isset($_SESSION['Correo'])) {
    $Correo = $_SESSION['Correo'];

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "audifonos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM registro WHERE Correo = ?");
    $stmt->bind_param("s", $Correo);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user_data = $result->fetch_assoc();

        // Mostrar los datos del usuario
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
} else {
    header("Location: InicioSesion.html");
    exit();
}
?>
