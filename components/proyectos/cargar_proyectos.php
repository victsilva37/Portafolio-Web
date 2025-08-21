<?php
require_once 'conexion_db.php';

// Consulta para obtener proyectos y sus tecnologías
$sql = "
    SELECT 
        p.id_proyecto, 
        p.nombre_proyecto, 
        p.desc_proyecto, 
        p.img_proyecto, 
        p.link_repo, 
        p.estado,
        STRING_AGG(DISTINCT t.nombre_tecnologia || '|' || t.icono, ',' ORDER BY t.nombre_tecnologia ASC) AS tecnologias
    FROM 
        proyectos p
    LEFT JOIN 
        proyecto_tecnologias pt ON p.id_proyecto = pt.id_proyecto
    LEFT JOIN 
        tecnologias t ON pt.id_tecnologia = t.id_tecnologia
    GROUP BY 
        p.id_proyecto, p.nombre_proyecto, p.desc_proyecto, p.img_proyecto, p.link_repo, p.estado
    ORDER BY 
        p.nombre_proyecto ASC
";

// Preparar y ejecutar
$stmt = $conn->prepare($sql);
$stmt->execute();

// Obtener resultados
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$proyectos = [];
foreach ($rows as $row) {
    // Procesar las tecnologías para separarlas en un array
    $tecnologias = [];
    if (!empty($row['tecnologias'])) {
        foreach (explode(',', $row['tecnologias']) as $tecnologia) {
            list($nombre, $icono) = explode('|', $tecnologia);
            $tecnologias[] = ['nombre' => $nombre, 'icono' => $icono];
        }
    }

    // Agregar el proyecto con sus tecnologías al array
    $proyectos[] = [
        'id_proyecto' => $row['id_proyecto'],
        'nombre_proyecto' => $row['nombre_proyecto'],
        'desc_proyecto' => $row['desc_proyecto'],
        'img_proyecto' => $row['img_proyecto'],
        'link_repo' => $row['link_repo'],
        'estado' => $row['estado'],
        'tecnologias' => $tecnologias
    ];
}

// No es necesario cerrar la conexión manualmente, PDO lo maneja
?>
