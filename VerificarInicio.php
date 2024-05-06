<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Correo']) && !empty($_POST['Correo']) && isset($_POST['Contrasena']) && !empty($_POST['Contrasena'])) {
        $Correo = $_POST['Correo'];
        $Contrasena = $_POST['Contrasena'];

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "audifonos";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error en la conexión a la base de datos: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM registro WHERE Correo = ? AND Contrasena = ?";
        $stmt = $conn->prepare($sql);

        $hashedPassword = md5($Contrasena);

        $stmt->bind_param("ss", $Correo, $hashedPassword);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Datos del usuario
                $user_data = $result->fetch_assoc();

                // Establecer las variables de sesión
                $_SESSION['Correo'] = $user_data['Correo'];
                $_SESSION['Nombre'] = $user_data['Nombre'];
                $_SESSION['Pais'] = $user_data['Pais'];
                $_SESSION['Ciudad'] = $user_data['Ciudad'];
                $_SESSION['CP'] = $user_data['CP'];

                header("Location: UsuarioCargado.php");
                exit();
            } else {
                echo "Correo o contraseña incorrectos.";
            }
        } else {
            echo "Error en la consulta: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Correo y contraseña son campos requeridos.";
    }
}
?>
