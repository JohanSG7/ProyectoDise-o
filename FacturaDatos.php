<?php
$servername = "localhost";
$username = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$dbname = "hotel_facts";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $habitacion = $_POST['habitacion'];
    $dias = $_POST['dias'];
    $precio = $_POST['precio'];
    $total = $dias * $precio;

    $sql = "INSERT INTO facturas (nombre, habitacion, dias, precio, total) VALUES ('$nombre', '$habitacion', $dias, $precio, $total)";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "<div class='container'><h1>Factura Generada</h1>";
        echo "<p>ID de la Factura: <strong>$last_id</strong></p>";
        echo "<p>Nombre del Cliente: <strong>$nombre</strong></p>";
        echo "<p>Tipo de Habitación: <strong>$habitacion</strong></p>";
        echo "<p>Número de Días: <strong>$dias</strong></p>";
        echo "<p>Precio por Noche: <strong>$$precio</strong></p>";
        echo "<h2>Total a Pagar: <strong>$$total</strong></h2>";
        echo "<button onclick='window.print()' class='btn'>Imprimir Factura</button></div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
