<?php
require_once 'data/illustrations.php';
?>

<section id="illustration" class="section">
    <div class="container">
        <h2 class="section-title">Illustration</h2>
        <p class="section-subtitle">Mes créations artistiques et illustrations</p>
        
        <?php echo display_gallery($illustrations, 'illustration'); ?>
    </div>
</section>