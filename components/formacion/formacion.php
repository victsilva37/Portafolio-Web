<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Link archivo CSS-->
    <link rel="stylesheet" href="components/formacion/formacion.css">
</head>
<body>
    <div id="form-main-container">
        <h1>Formación</h1>

        <div id="form-content">
            <?php include 'components/formacion/cargar_formacion.php'; ?>
            <?php if (!empty($formaciones)): ?>
                <?php foreach ($formaciones as $form): ?>
                    <div class="form-item">
                        <div class="form-details">

                            <!--NOMBRE DE LA FORMACIÓN E INSTITUCIÓN-->

                                <h4><strong><?php echo htmlspecialchars($form['nombre_formacion']); ?></strong> - <?php echo htmlspecialchars($form['institucion']); ?></h4>


                            <!--FECHAS-->

                                <small>(<strong><?php echo htmlspecialchars($form['fecha_inicio']); ?> - <?php echo htmlspecialchars($form['fecha_final']); ?></strong>)
                                </small>
                        </div>


                        <!--DESCRIPCIÓN E IMAGEN-->

                            <div class="form-logo">
                                <p><?php echo htmlspecialchars($form['desc_formacion']); ?></p>
                                <img src="assets/<?php echo htmlspecialchars($form['logo']); ?>" alt="Logo <?php echo htmlspecialchars($form['institucion']); ?>" />
                            </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay formaciones registradas.</p>
            <?php endif; ?>
        </div>
        <br>
    </div>
    
</body>
</html>
