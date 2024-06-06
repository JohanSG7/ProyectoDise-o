<?php 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aurora hotel";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$documento = $_POST['documento'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$num_personas = $_POST['num-personas'];
$fecha_reserva = $_POST['fecha-reserva'];
$valor_habitacion = $_POST['valor-habitacion'];


$sql = "INSERT INTO reservas (nombre, apellido, documento, correo, telefono, num_personas, fecha_reserva, valor_habitacion)
VALUES ('$nombre', '$apellido', '$documento', '$correo', '$telefono', '$num_personas', '$fecha_reserva', '$valor_habitacion')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Reserva realizada con exito.');
    window.location.href = 'seleccionar_habitacion.html';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>