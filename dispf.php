<?php
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aurora hotel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

   
    $sql = "SELECT COUNT(*) AS count FROM disponibilidad WHERE fecha = ?";
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