<?php
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    
    // Conexión a la base de datos (modifica estos valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aurora hotel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para verificar disponibilidad de la fecha
    $sql = "SELECT COUNT(*) AS count FROM rerservas WHERE fecha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count']> 0) {
        echo "La fecha seleccionada no está disponible";
    } else {
        echo "La fecha seleccionada está disponible";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No se ha seleccionado ninguna fecha.";
}
?>