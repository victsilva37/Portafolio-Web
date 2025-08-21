<?php
require_once 'conexion_db.php';

// Consulta para obtener las experiencias y tecnologías relacionadas
$sql = "
    SELECT 
        e.id_exp,
        e.cargo_exp,
        e.nombre_empresa,
        e.direccion,
        e.modalidad,
        TO_CHAR(e.fecha_inicio, 'Mon YYYY') AS fecha_inicio,
        CASE 
            WHEN e.fecha_final IS NOT NULL THEN TO_CHAR(e.fecha_final, 'Mon YYYY')
            ELSE 'Actual'
        END AS fecha_final,
        e.desc_exp,
        STRING_AGG(t.nombre_tecnologia || '|' || t.icono, ',') AS tecnologias
    FROM experiencia e
    LEFT JOIN experiencia_tecnologia et ON e.id_exp = et.id_exp
    LEFT JOIN tecnologias t ON et.id_tecnologia = t.id_tecnologia
    GROUP BY e.id_exp
    ORDER BY 
        e.fecha_final IS NULL DESC,
        e.fecha_final DESC,          
        e.fecha_inicio DESC          
";


// Preparar y ejecutar
$stmt = $conn->prepare($sql);
$stmt->execute();

// Obtener resultados
$experiencias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ejemplo de uso:
// foreach($experiencias as $exp) {
//     echo $exp['cargo_exp'] . " - " . $exp['tecnologias'] . "<br>";
// }
?>
