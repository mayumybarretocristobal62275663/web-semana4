<?php
// CONEXIÓN
$conexion = new mysqli("localhost", "root", "", "sistema_web");

// VALIDAR CONEXIÓN
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// VALIDAR ENVÍO DEL FORMULARIO
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'] ?? "";
    $correo = $_POST['correo'] ?? "";
    $telefono = $_POST['telefono'] ?? "";
    $mensaje = $_POST['mensaje'] ?? "";

    // INSERTAR DATOS
    $sql = "INSERT INTO tb_clientes (nombre, correo, telefono, mensaje)
            VALUES ('$nombre', '$correo', '$telefono', '$mensaje')";

    if ($conexion->query($sql) === TRUE) {
        echo "DATOS GUARDADOS CORRECTAMENTE ";
    } else {
        echo "Error: " . $conexion->error;
    }

} else {
    echo "ACCESO NO PERMITIDO";
}

// CERRAR CONEXIÓN
$conexion->close();
?>