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

    $sql = "SELECT * FROM registro WHERE Correo = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $Correo);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();

            // Establece las variables de sesión
            $_SESSION['Nombre'] = $user_data['Nombre'];
            $_SESSION['Pais'] = $user_data['Pais'];
            $_SESSION['Ciudad'] = $user_data['Ciudad'];
            $_SESSION['CP'] = $user_data['CP'];
        } else {
            echo "No se encontraron resultados para el usuario.";
        }
    } else {
        echo "Error al ejecutar la consulta: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="Imagenes/logoMoto.png" type="image/png">
    <title>Motovelica Store - Perfil de Usuario</title>
</head>
<body>

    <div class="header">
        <a href="Index.html">
            <img src="Imagenes/logoMoto.png" alt="Logo de Motovelica Store" max-width="10%">
        </a>
        <h1>Motovelica Store</h1>
        <script src="script.js"></script>
        <div class="search-container">
            <input type="text" id="search-bar" placeholder="Buscar...">
            <button id="search-btn" onclick="buscar()">
                <img src="Imagenes/Buscar.png" alt="Buscar">
            </button>
        </div>
    </div>

    <div class="contenido-perfil">
        <h2>Datos del Usuario</h2>
        <p><strong>Nombre:</strong> <?php echo isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : ''; ?></p>
        <p><strong>País:</strong> <?php echo isset($_SESSION['Pais']) ? $_SESSION['Pais'] : ''; ?></p>
        <p><strong>Ciudad:</strong> <?php echo isset($_SESSION['Ciudad']) ? $_SESSION['Ciudad'] : ''; ?></p>
        <p><strong>Código Postal:</strong> <?php echo isset($_SESSION['CP']) ? $_SESSION['CP'] : ''; ?></p>
    </div>

    <footer>
        <div class="footer-container">
            <!-- Columna 1: Horario -->
            <div class="footer-column">
                <h4>Horario</h4>
                <p>Lunes a Viernes: 9 am - 6 pm</p>
                <p>Sábado y Domingo: Cerrado</p>
            </div>

            <!-- Columna 2: Aviso de Privacidad -->
            <div class="footer-column">
                <h4><a href="Privacidad.html">Aviso de Privacidad</a></h4>
                <p>Tu privacidad es importante para nosotros...</p>
            </div>

            <!-- Columna 3: Contacto -->
            <div class="footer-column">
                <h4>Contacto</h4>
                <p>Correo: sanchezr12@uabc.edu.mx</p>
                <p>Correo: sharai.soriano@uabc.edu.mx</p>
                <p>Teléfono: +52 6643667015</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>

