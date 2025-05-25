<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link archivo CSS-->
    <link rel="stylesheet" href="components/tecnologias/template/cont-base-datos/cont-base-datos.css">

</head>
<body>

    <!--TÍTULO-->

        <h4>Bases de datos</h4>


    <!--CONTENIDO-->

        <div id="tec-bd-content">
            <?php
            $_GET['tipo'] = 'Base de Datos';
            include 'components/tecnologias/server/cargar_tecnologias.php';

            // Paginación para Base de Datos
            $totalItems = count($tecnologias);
            $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = isset($_GET['page_bd']) ? max(1, min((int)$_GET['page_bd'], $totalPages)) : 1;

            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $paginatedBD = array_slice($tecnologias, $startIndex, $itemsPerPage);
            ?>

            <?php if (!empty($paginatedBD)): ?>
                <?php foreach ($paginatedBD as $tec): ?>
                    <div class="card-tecno-bd">
                        <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                        <h3><?= $tec['nombre_tecnologia'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay tecnologías registradas.</p>
            <?php endif; ?>
        </div>


    <!--PAGINATION-->

        <!-- Paginación para Base de Datos -->
        <?php if ($totalPages > 1): ?>
            <nav id="nav-bd">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="?tipo=Base+de+Datos&page_bd=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

</body>
</html>