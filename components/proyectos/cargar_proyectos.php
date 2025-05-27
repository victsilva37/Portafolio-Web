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

// Consulta para obtener proyectos y sus tecnologías
$sql = "
    SELECT 
        p.id_proyecto, 
        p.nombre_proyecto, 
        p.desc_proyecto, 
        p.img_proyecto, 
        p.link_repo, 
        p.estado,
        GROUP_CONCAT(DISTINCT CONCAT(t.nombre_tecnologia, '|', t.icono) ORDER BY t.nombre_tecnologia ASC) AS tecnologias
    FROM 
        proyectos p
    LEFT JOIN 
        proyecto_tecnologias pt ON p.id_proyecto = pt.id_proyecto
    LEFT JOIN 
        tecnologias t ON pt.id_tecnologia = t.id_tecnologia
    GROUP BY 
        p.id_proyecto, p.nombre_proyecto, p.desc_proyecto, p.img_proyecto, p.link_repo, p.estado
    ORDER BY 
        p.nombre_proyecto ASC;
";

$result = $conn->query($sql);

$proyectos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
}

$conn->close();
?>
