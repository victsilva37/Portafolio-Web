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

    // Consulta para obtener las experiencias y tecnologías relacionadas
    $sql = "
        SELECT 
            e.id_exp,
            e.cargo_exp,
            e.nombre_empresa,
            e.direccion,
            e.modalidad,
            DATE_FORMAT(e.fecha_inicio, '%M %Y') AS fecha_inicio,
            IF(e.fecha_final IS NOT NULL, DATE_FORMAT(e.fecha_final, '%M %Y'), 'Actual') AS fecha_final,
            e.desc_exp,
            GROUP_CONCAT(CONCAT(t.nombre_tecnologia, '|', t.icono) SEPARATOR ',') AS tecnologias
        FROM experiencia e
        LEFT JOIN experiencia_tecnologia et ON e.id_exp = et.id_exp
        LEFT JOIN tecnologias t ON et.id_tecnologia = t.id_tecnologia
        GROUP BY e.id_exp
    ";

    $result = $conn->query($sql);

    $experiencias = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $experiencias[] = $row;
        }
    }

    $conn->close();
?>
