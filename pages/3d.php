<?php
require_once 'data/3d_models.php';
?>

<section id="3d" class="section">
    <div class="container">
        <h2 class="section-title">Modélisation 3D</h2>
        <p class="section-subtitle">Mes modèles et animations 3D</p>
        
        <?php echo display_gallery($models_3d, '3d'); ?>
    </div>
</section>
