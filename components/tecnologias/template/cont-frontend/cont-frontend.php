<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="components/tecnologias/template/cont-frontend/cont-frontend.css">
</head>
<body>
    
    <!--TÍTULO-->

        <h4>Frontend</h4>


    <!--CONTENIDO-->

        <div id="tec-front-content">
            <?php
            $_GET['tipo'] = 'Frontend';
            include 'components/tecnologias/server/cargar_tecnologias.php';

            // Paginación para Frontend
            $itemsPerPage = 5;
            $totalItems = count($tecnologias);
            $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = isset($_GET['page_frontend']) ? max(1, min((int)$_GET['page_frontend'], $totalPages)) : 1;

            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $paginatedFrontend = array_slice($tecnologias, $startIndex, $itemsPerPage);
            ?>

            <?php if (!empty($paginatedFrontend)): ?>
                <?php foreach ($paginatedFrontend as $tec): ?>
                    <div class="card-tecno-front">
                        <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                        <h3><?= $tec['nombre_tecnologia'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay tecnologías registradas.</p>
            <?php endif; ?>
        </div>


    <!--NAVIGATION-->

        <!-- Paginación para Frontend -->
        <?php if ($totalPages > 1): ?>
            <nav id="nav-frontend">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="?tipo=Frontend&page_frontend=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>


</body>
</html>