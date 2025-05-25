<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="components/tecnologias/template/cont-lenguajes/cont-lenguajes.css">
</head>
<body>
    
    <!--TÍTULO-->

        <h4>Lenguajes</h4>


    <!--CONTENIDO-->

        <div id="tec-leng-content">
            <?php
            $_GET['tipo'] = 'Lenguaje';
            include 'components/tecnologias/server/cargar_tecnologias.php';

            // Paginación para Lenguaje
            $itemsPerPage = 5;
            $totalItems = count($tecnologias);
            $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = isset($_GET['page_Lenguaje']) ? max(1, min((int)$_GET['page_Lenguaje'], $totalPages)) : 1;

            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $paginatedLenguaje = array_slice($tecnologias, $startIndex, $itemsPerPage);
            ?>

            <?php if (!empty($paginatedLenguaje)): ?>
                <?php foreach ($paginatedLenguaje as $tec): ?>
                    <div class="card-tecno-leng">
                        <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                        <h3><?= $tec['nombre_tecnologia'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay tecnologías registradas.</p>
            <?php endif; ?>
        </div>


    <!--NAVIGATION-->

        <!-- Paginación para Lenguaje -->
        <?php if ($totalPages > 1): ?>
            <nav id="nav-Lenguaje">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="?tipo=Lenguaje&page_Lenguaje=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>


</body>
</html>