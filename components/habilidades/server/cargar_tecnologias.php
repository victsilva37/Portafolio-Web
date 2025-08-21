<?php
require_once 'conexion_db.php';

// Tipo dinámico
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'Frontend';

// Consulta para obtener tecnologías según el tipo
$sql = "SELECT nombre_tecnologia, tipo, icono FROM tecnologias WHERE tipo = :tipo";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':tipo', $tipo, PDO::PARAM_STR);
$stmt->execute();

// Obtener resultados
$tecnologias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ejemplo de uso:
// foreach($tecnologias as $tec) {
//     echo $tec['nombre_tecnologia'] . "<br>";
// }

// No hace falta cerrar el statement ni la conexión, PDO los maneja automáticamente
?>
