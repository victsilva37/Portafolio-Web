<?php 
    // Cargar variables de entorno desde .env
    if (file_exists(__DIR__ . '/.env')) {
        $env = parse_ini_file(__DIR__ . '/.env');
        $servername = $env['DB_HOST'] ?? 'localhost';
        $username = $env['DB_USER'] ?? 'root';
        $password = $env['DB_PASS'] ?? '';
        $dbname = $env['DB_NAME'] ?? 'portafolio';
    }

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>