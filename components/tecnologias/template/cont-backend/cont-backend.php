<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--LInk archivo CSS-->
    <link rel="stylesheet" href="components/tecnologias/template/cont-backend/cont-backend.css">

</head>
<body>

    <!--TÍTULO-->

        <h4>Backend</h4>


    <!--CONTENIDO-->

        <div id="tec-back-content">
            <?php
            $_GET['tipo'] = 'Backend';
            include 'components/tecnologias/server/cargar_tecnologias.php';

            // Paginación para Backend
            $totalItems = count($tecnologias);
            $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = isset($_GET['page_backend']) ? max(1, min((int)$_GET['page_backend'], $totalPages)) : 1;

            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $paginatedBackend = array_slice($tecnologias, $startIndex, $itemsPerPage);
            ?>

            <?php if (!empty($paginatedBackend)): ?>
                <?php foreach ($paginatedBackend as $tec): ?>
                    <div class="card-tecno-back">
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
            <nav id="nav-backend">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="?tipo=Backend&page_backend=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

    
</body>
</html>