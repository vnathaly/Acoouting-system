<?php
include_once "conexion.php"; 
session_start();
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        
        $sql = $conexion->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$password'");
        
        if ($datos = $sql->fetch_object()) {
            $_SESSION["ID"]=$datos->ID;
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["apellido"]=$datos->apellido;
            header("location:inicio.php");
        } else {
            echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
    } else {
        echo "Campos vacíos";
    }
}
?>
