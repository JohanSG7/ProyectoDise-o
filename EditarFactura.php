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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM facturas WHERE id = $id";
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
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <div class="container">
                <h1>Editar Factura</h1>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre del Cliente:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="habitacion">Tipo de Habitación:</label>
                        <select id="habitacion" name="habitacion" required>
                            <option value="Deluxe" <?php if ($row['habitacion'] == 'Deluxe') echo 'selected'; ?>>Deluxe</option>
                            <option value="Presidencial" <?php if ($row['habitacion'] == 'Presidencial') echo 'selected'; ?>>Presidencial</option>
                            <option value="Familiar" <?php if ($row['habitacion'] == 'Familiar') echo 'selected'; ?>>Familiar</option>
                            <option value="Superior" <?php if ($row['habitacion'] == 'Superior') echo 'selected'; ?>>Superior</option>
                            <option value="Ejecutiva" <?php if ($row['habitacion'] == 'Ejecutiva') echo 'selected'; ?>>Ejecutiva</option>
                            <option value="Estándar" <?php if ($row['habitacion'] == 'Estándar') echo 'selected'; ?>>Estándar</option>
                            <option value="Junior" <?php if ($row['habitacion'] == 'Junior') echo 'selected'; ?>>Junior</option>
                            <option value="Jardín" <?php if ($row['habitacion'] == 'Jardín') echo 'selected'; ?>>Acceso al Jardín</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dias">Número de Días:</label>
                        <input type="number" id="dias" name="dias" value="<?php echo $row['dias']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio por Noche:</label>
                        <input type="number" id="precio" name="precio" value="<?php echo $row['precio']; ?>" required>
                    </div>
                    <button type="submit" class="btn">Actualizar Factura</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<div class='container'><p>No se encontró la factura con ID $id.</p></div>";
