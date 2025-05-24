<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = ""; // Cambia esto según tu configuración
    $dbname = "portafolio";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Tipo dinámico
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'Frontend';

    // Consulta para obtener tecnologías según el tipo
    $sql = "SELECT nombre_tecnologia, tipo, icono FROM tecnologias WHERE tipo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tipo);
    $stmt->execute();
    $result = $stmt->get_result();

    $tecnologias = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tecnologias[] = $row;
        }
    }

    $stmt->close();
    $conn->close();
?>
