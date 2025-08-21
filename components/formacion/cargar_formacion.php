<?php
require_once 'conexion_db.php';

// Consulta para obtener los datos de formación y sus logros
$sql = "
SELECT 
    f.id_formacion, 
    f.nombre_formacion, 
    f.desc_formacion, 
    f.institucion, 
    f.logo, 
    TO_CHAR(f.fecha_inicio, 'Mon YYYY') AS fecha_inicio, 
    COALESCE(TO_CHAR(f.fecha_final, 'Mon YYYY'), 'Actual') AS fecha_final,
    l.id_logro, 
    l.nombre_logro, 
    l.tipo_logro, 
    l.icono_logro, 
    l.enlace_logro
FROM formacion AS f
LEFT JOIN logro_formacion AS lf ON f.id_formacion = lf.id_formacion
LEFT JOIN logros AS l ON lf.id_logro = l.id_logro
ORDER BY f.fecha_inicio DESC
";

// Preparar y ejecutar la consulta
$stmt = $conn->prepare($sql);
$stmt->execute();

// Obtener resultados
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$formaciones = [];
foreach ($rows as $row) {
    $id_formacion = $row['id_formacion'];

    // Organizar los logros por formación
    if (!isset($formaciones[$id_formacion])) {
        $formaciones[$id_formacion] = [
            'id_formacion' => $row['id_formacion'],
            'nombre_formacion' => $row['nombre_formacion'],
            'desc_formacion' => $row['desc_formacion'],
            'institucion' => $row['institucion'],
            'logo' => $row['logo'],
            'fecha_inicio' => $row['fecha_inicio'],
            'fecha_final' => $row['fecha_final'],
            'logros' => []
        ];
    }

    // Agregar logros si existen
    if (!empty($row['id_logro'])) {
        $formaciones[$id_formacion]['logros'][] = [
            'id_logro' => $row['id_logro'],
            'nombre_logro' => $row['nombre_logro'],
            'tipo_logro' => $row['tipo_logro'],
            'icono_logro' => $row['icono_logro'],
            'enlace_logro' => $row['enlace_logro']
        ];
    }
}

// Convertir a una lista numerada de formaciones
$formaciones = array_values($formaciones);

?>
