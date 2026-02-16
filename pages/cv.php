<?php
require_once 'data/cv_data.php';
?>

<section id="cv" class="section">
    <div class="container">
        <h2 class="section-title">Curriculum Vitae</h2>
        <p class="section-subtitle">Mon parcours et mes compétences</p>
        
        <div class="cv-section">
            <div class="cv-card">
                <h3>Formation</h3>
                <?php foreach($formations as $formation): ?>
                <div class="cv-item">
                    <h4><?php echo $formation['diplome']; ?></h4>
                    <p class="date"><?php echo $formation['periode']; ?></p>
                    <p><?php echo $formation['description']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="cv-card">
                <h3>Expérience</h3>
                <?php foreach($experiences as $exp): ?>
                <div class="cv-item">
                    <h4><?php echo $exp['poste']; ?></h4>
                    <p class="date"><?php echo $exp['periode']; ?></p>
                    <p><?php echo $exp['description']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <h3 style="margin: 3rem 0 2rem; font-size: 2rem;">Compétences</h3>
        <div class="skills-grid">
            <?php foreach($competences as $comp): ?>
                <?php echo display_skill($comp['nom'], $comp['niveau']); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>