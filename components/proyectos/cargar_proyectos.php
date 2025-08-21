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
        (
            SELECT STRING_AGG(tecnologias.tecnologia, ',' ORDER BY tecnologias.tecnologia ASC)
            FROM (
                SELECT DISTINCT t.nombre_tecnologia || '|' || t.icono AS tecnologia
                FROM proyecto_tecnologias pt2
                JOIN tecnologias t ON pt2.id_tecnologia = t.id_tecnologia
                WHERE pt2.id_proyecto = p.id_proyecto
            ) AS tecnologias
        ) AS tecnologias
    FROM 
        proyectos p
    GROUP BY 
        p.id_proyecto, p.nombre_proyecto, p.desc_proyecto, p.img_proyecto, p.link_repo, p.estado
    ORDER BY 
        p.nombre_proyecto ASC;
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
