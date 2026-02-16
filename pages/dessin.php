<?php
require_once 'data/dessin.php';
?>

<section id="dessin" class="section">
    <div class="container">
        <h2 class="section-title">Dessins</h2>
        <p class="section-subtitle">Mes créations artistiques et entrainements sur papier</p>
        
        <?php echo display_gallery($dessins, 'dessins'); ?>
    </div>
</section>