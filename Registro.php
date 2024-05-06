
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Imagenes/logoMoto.png" type="image/png"/>
    <title>Registro</title>
    <link rel="stylesheet" href="estilos.css">
 



<body>
<!-- Header ENCABEZADO DE LA PAGINA-->
<div class="header">
    <a href="Index.html">
        <img src="Imagenes/logoMoto.png" alt="Logo de Motovelica Store" max-width="10%">
    </a>
    <h1>Motovelica Store</h1>
    <nav>
        <ul>
            <li><a href="Perfil.html" target="_blank">Perfil</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Pedidos</a></li>
            <li><a href="#">Configuración</a></li>
        </ul>
    </nav>
</div>

<!-- Contenido -->
    <main class="main-sistema ms-0 mod-ms-lg-6">

<!-- Breadcrumb -->
<div class="bg-breadcrumb py-2 px-3 shadow-sm mt-4" aria-label="breadcrumb">
  <ul class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="Perfil-Usuario.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Registro</li>
          <li class="breadcrumb-item active" aria-current="page">Prototipo</li>
        </ul>
      </div>
      <div class="container-fluid py-3">
        <div class="card text-white">
          <div class="card-header bg-naranja-primario">
                <p class="h4 text-blanco text-center p-0 m-0">Mis Datos</p>
          </div>
          <div class="card-body text-dark px-5">   
                <form class="needs-validation" action="Perfil-Usuario.php" method="post" novalidate>


    <body>
    <form action="Registro-DB.php" method="POST">
        <h1>Registro</h1>
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" id="username" required>
        <label for="pais">País</label>
        <input type="text" name="pais" id="pais" required>
        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" required>
        <label for="cp">Código postal</label>
        <input type="text" name="cp" id="cp" required>
        <label for="email-registro">Correo electrónico</label>
        <input type="email" name="email-registro" id="email-registro" required>
        <label for="password-registro">Contraseña</label>
        <input type="password" name="password-registro" id="password-registro" required>
        <input type="submit" value="Registrarse">
    </form>

</body>
</html>


