<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "aurora hotel"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tipo_habitacion = $_POST['tipo_habitacion'];
    $cantidad_dias = $_POST['cantidad_dias'];
    $precio_noche = $_POST['precio_noche'];
    $total = $_POST['total'];

    
    $sql = "UPDATE factura SET nombre='$nombre', tipo_habitacion='$tipo_habitacion', cantidad_dias=$cantidad_dias, precio_noche=$precio_noche, total=$total WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Cambios realizados Correctamente.');
        window.location.href = 'Factura.html';
        </script>";
    } else {
        echo "Error al actualizar la factura: " . $conn->error;
    }
}

$conn->close();
?>