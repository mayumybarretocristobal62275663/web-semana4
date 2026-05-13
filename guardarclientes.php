<?php
// 1. Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistema_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 2. Verificar que los datos vengan del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recibimos los 3 datos que SI existen en tu HTML
    $nombre  = $_POST['nombre'];
    $correo  = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // 3. Insertar en la tabla 'testimonios' (asegúrate que se llame así en phpMyAdmin)
// Cambia 'consultas' por 'testimonios'
$sql = "INSERT INTO testimonios (nombre, correo, mensaje) 
        VALUES ('$nombre', '$correo', '$mensaje')";

    if ($conexion->query($sql) === TRUE) {
        // Si todo sale bien, muestra un aviso y regresa a la página
        echo "<script>
                alert('¡Gracias! Tu opinión ha sido recibida con éxito.');
                window.location.href='clientes.html'; 
              </script>";
    } else {
        // Si hay un error (por ejemplo, si la tabla no existe), te dirá qué pasó
        echo "Error: " . $conexion->error;
    }
}

$conexion->close();
?>