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
    $arrival_time = $_POST['arrival_time'];
    $room_number = $_POST['room_number'];
    $number_of_people = $_POST['number_of_people'];
    $id_document = $_POST['id_document'];

    
    $stmt = $conn->prepare("SELECT * FROM reservas WHERE documento = ?");
    $stmt->bind_param("s", $id_document);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        $stmt = $conn->prepare("INSERT INTO check_in (hora_llegada, numero_de_habitacion, numero_personas, documento) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siis", $arrival_time, $room_number, $number_of_people, $id_document);
        if ($stmt->execute()) {
            echo "<script>
                alert('Check-in exitoso.');
                window.location.href = 'seleccionar_habitacion.html';
                </script>";
        } else {
            echo "<script>
                alert('Error al realizar el check-in.');
                window.location.href = 'seleccionar_habitacion.html'; 
                </script>";
        }
    } else {
        echo "<script>
            alert('Documento de identidad no encontrado en las reservas.');
            window.location.href = 'seleccionar_habitacion.html';
            </script>";
    }

    $stmt->close();
}

$conn->close();
?>