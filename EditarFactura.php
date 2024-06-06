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

    
    $sql = "SELECT * FROM factura WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <title>Editar Factura</title>
            <link rel="stylesheet" href="actu_fac.css">
        </head>
        <body>
            <h2>Editar Factura</h2>
            <form action="actualizar_factura.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tipo_habitacion">Tipo de Habitación:</label>
                    <input type="text" id="tipo_habitacion" name="tipo_habitacion" value="<?php echo $row['tipo_habitacion']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="cantidad_dias">Cantidad de Días:</label>
                    <input type="number" id="cantidad_dias" name="cantidad_dias" value="<?php echo $row['cantidad_dias']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="precio_noche">Precio por Noche:</label>
                    <input type="number" id="precio_noche" name="precio_noche" value="<?php echo $row['precio_noche']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="total">Total:</label>
                    <input type="number" id="total" name="total" value="<?php echo $row['total']; ?>" required>
                </div>
                <button type="submit" class="btn">Actualizar</button>
            </form>
        </body>
        </html>
<?php
    } else {
        echo "Factura no encontrada";
    }
}

$conn->close();
?>