<?php
require_once 'data/dev_projects.php';
?>

<section id="developpement" class="section">
    <div class="container">
        <h2 class="section-title">Développement</h2>
        <p class="section-subtitle">Mes projets de développement web et logiciels</p>
        
        <?php echo display_projects($dev_projects); ?>
    </div>
</section>
