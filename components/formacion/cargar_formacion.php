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

    // Consulta para obtener los datos de formación
    $sql = "SELECT id_formacion, nombre_formacion, desc_formacion, institucion, logo, 
                DATE_FORMAT(fecha_inicio, '%M %Y') AS fecha_inicio, 
                IFNULL(DATE_FORMAT(fecha_final, '%M %Y'), 'Actual') AS fecha_final 
            FROM formacion
            ORDER BY fecha_inicio DESC";

    $result = $conn->query($sql);

    $formaciones = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $formaciones[] = $row;
        }
    }

    $conn->close();
?>
