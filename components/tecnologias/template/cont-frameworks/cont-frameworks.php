<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--LInk archivo CSS-->
    <link rel="stylesheet" href="components/tecnologias/template/cont-frameworks/cont-frameworks.css">

</head>
<body>

    <!--TÍTULO-->

        <h4>Frameworks & Librerías</h4>


    <!--CONTENIDO-->

        <div id="tec-frame-content">
            <?php
            $_GET['tipo'] = 'Framework/Librería';
            include 'components/tecnologias/server/cargar_tecnologias.php';

            // Paginación para Backend
            $totalItems = count($tecnologias);
            $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = isset($_GET['page_frame']) ? max(1, min((int)$_GET['page_backend'], $totalPages)) : 1;

            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $paginatedBackend = array_slice($tecnologias, $startIndex, $itemsPerPage);
            ?>

            <?php if (!empty($paginatedBackend)): ?>
                <?php foreach ($paginatedBackend as $tec): ?>
                    <div class="card-tecno-frame">
                        <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                        <h3><?= $tec['nombre_tecnologia'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay tecnologías registradas.</p>
            <?php endif; ?>
        </div>

    <!--PAGINATION-->

        <!-- Paginación para Backend -->
        <?php if ($totalPages > 1): ?>
            <nav id="nav-frame">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="?tipo=Frame&page_frame=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

    
</body>
</html>