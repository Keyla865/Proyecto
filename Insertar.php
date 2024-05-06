<?php
include("Registro-DB.php");
$getmysql=new mysqlconex();
$getconex=$getmysql->conex();

if(isset($_POST['registrar'])){
    if(strlen($_POST['username']) >= 1 && strlen($_POST['pais']) >= 1 && strlen($_POST['ciudad']) >= 1 && strlen($_POST['cp']) >= 1 && strlen($_POST['email-registro']) >= 1 && strlen($_POST['password-registro']) >= 1){
        $username = trim($_POST['username']);
        $pais = trim($_POST['pais']);
        $ciudad = trim($_POST['ciudad']);
        $cp = trim($_POST['cp']);
        $email = trim($_POST['email-registro']);
        $password = trim($_POST['password-registro']);
        $consulta = "INSERT INTO usuarios(nombre, pais, ciudad, cp, email, contrasena) VALUES ('$username','$pais','$ciudad','$cp','$email','$password')";
        $resultado = mysqli_query($getconex,$consulta);
        if($resultado){
            ?>
            <h3 class="ok">¡Te has registrado correctamente!</h3>
            <?php
        } else {
            ?>
            <h3 class="bad">¡Ups ha ocurrido un error!</h3>
            <?php
        }
    }   else {
        ?>
        <h3 class="bad">¡Por favor complete los campos!</h3>
        <?php
    }

}