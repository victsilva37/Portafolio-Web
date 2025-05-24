<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Link archivo CSS-->
    <link rel="stylesheet" href="components/tecnologias/template/cont-devops/cont-devops.css">

</head>
<body>

    <!--TÍTULO-->

        <h4>DevOps</h4>


    <!--CONTENIDO-->

        <div id="tec-dev-content">
            <?php
            $_GET['tipo'] = 'DevOps';
            include 'components/tecnologias/server/cargar_tecnologias.php';

            // Paginación para DevOps
            $totalItems = count($tecnologias);
            $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = isset($_GET['page_devops']) ? max(1, min((int)$_GET['page_devops'], $totalPages)) : 1;

            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $paginatedDevOps = array_slice($tecnologias, $startIndex, $itemsPerPage);
            ?>

            <?php if (!empty($paginatedDevOps)): ?>
                <?php foreach ($paginatedDevOps as $tec): ?>
                    <div class="card-tecno-dev">
                        <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                        <h3><?= $tec['nombre_tecnologia'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay tecnologías registradas.</p>
            <?php endif; ?>
        </div>


    <!--PAGINATION-->

        <!-- Paginación para DevOps -->
        <?php if ($totalPages > 1): ?>
            <nav id="nav-devops">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="?tipo=DevOps&page_devops=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

</body>
</html>