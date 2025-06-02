<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Link archivo CSS-->
    <link rel="stylesheet" href="components/tecnologias/template/cont-herramientas/cont-herramientas.css">

</head>
<body>

     <!--TÍTULO-->

        <h4>Herramientas & Entornos</h4>


    <!--CONTENIDO-->

        <div id="tec-her-content">
            <?php
            $_GET['tipo'] = 'Herramienta';
            include 'components/tecnologias/server/cargar_tecnologias.php';

            // Paginación para Herramienta
            $itemsPerPage = 5;
            $totalItems = count($tecnologias);
            $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = isset($_GET['page_Herramienta']) ? max(1, min((int)$_GET['page_Herramienta'], $totalPages)) : 1;

            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $paginatedHerramienta = array_slice($tecnologias, $startIndex, $itemsPerPage);
            ?>

            <?php if (!empty($paginatedHerramienta)): ?>
                <?php foreach ($paginatedHerramienta as $tec): ?>
                    <div class="card-tecno-her">
                        <img id="img_tecno" src="assets/<?= $tec['icono'] ?>" alt="<?= $tec['nombre_tecnologia'] ?> icono">
                        <h3><?= $tec['nombre_tecnologia'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay tecnologías registradas.</p>
            <?php endif; ?>
        </div>


    <!--NAVIGATION-->

        <!-- Paginación para Herramienta -->
        <?php if ($totalPages > 1): ?>
            <nav id="nav-Herramienta">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="?tipo=Herramienta&page_Herramienta=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

</body>
</html>