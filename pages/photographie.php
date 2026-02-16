<?php
require_once 'data/photos.php';
?>

<section id="photographie" class="section">
    <div class="container">
        <h2 class="section-title">Photographie</h2>
        <p class="section-subtitle">Mes photos et projets photographiques</p>
        
        <?php echo display_gallery($photos, 'photo'); ?>
    </div>
</section>
