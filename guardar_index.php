<?php
$conexion = new mysqli("localhost", "root", "", "sistema_web");

if ($conexion->connect_error) {
    die("Error: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos los datos de los 'name' del HTML
    $nombre   = $_POST['nombre'];
    $correo   = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $mensaje  = $_POST['mensaje'];
    $origen   = $_POST['origen'];

    $sql = "INSERT INTO consultas (nombre, correo, telefono, mensaje, origen) 
            VALUES ('$nombre', '$correo', '$telefono', '$mensaje', '$origen')";

    if ($conexion->query($sql) === TRUE) {
        // MENSAJE PERSONALIZADO
        echo "<script>
                alert('¡Gracias " . $nombre . "! Tu mensaje de " . $origen . " se guardó correctamente.');
                window.history.back();
              </script>";
    } else {
        echo "Error: " . $conexion->error;
    }
}
$conexion->close();
?>