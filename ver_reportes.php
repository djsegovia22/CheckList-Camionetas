<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "usuario", "contraseña", "revisiones_camionetas");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los reportes
$sql = "SELECT * FROM reportes";
$result = $conn->query($sql);

echo "<h1>Reportes de Camionetas</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>Reporte de " . $row['equipo'] . " - " . $row['fecha_reporte'] . "</h3>";
        echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
        echo "<p><strong>Permiso de Circulación:</strong> " . $row['permiso_circulacion'] . "</p>";
        echo "<p><strong>Comentarios:</strong> " . $row['comentarios'] . "</p>";
        echo "<a href='generar_pdf.php?id=" . $row['id'] . "'>Descargar PDF</a>";
        echo "</div><hr>";
    }
} else {
    echo "No hay reportes disponibles.";
}

$conn->close();
?>
