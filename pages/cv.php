<?php
// CV page: simple links and download buttons for PDF versions
?>

<section id="cv" class="section">
    <div class="container">
        <h2 class="section-title">Curriculum Vitae</h2>
        <p class="section-subtitle">Consultez ou téléchargez mon CV au format PDF</p>

        <?php
        $cv_web = 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/Thomas%20Eugene%20-%20CV%20-%2020252026/Thomas%20Eugene%20-%20CV%20-%2020252026.pdf';
        $cv_bw = 'https://pub-d6e16cabe530450d941567e9209c59fb.r2.dev/Thomas%20Eugene%20-%20CV%20-%2020252026/Thomas%20Eugene%20-%20CV%20-%2020252026%20-%20b%26w.pdf';
        ?>

        <div class="cv-actions" style="margin:1.5rem 0; display:flex; gap:0.75rem; flex-wrap:wrap;">
            <a href="<?php echo $cv_web; ?>" target="_blank" class="btn-primary">Voir le CV (version web)</a>
            <a href="<?php echo $cv_bw; ?>" target="_blank" class="btn-secondary">Voir le CV (noir & blanc)</a>
            <a href="<?php echo $cv_web; ?>" download="Thomas-Eugene-CV-2025-2026.pdf" class="btn-primary">Télécharger (web)</a>
            <a href="<?php echo $cv_bw; ?>" download="Thomas-Eugene-CV-2025-2026-bw.pdf" class="btn-secondary">Télécharger (noir & blanc)</a>
        </div>

        <p style="margin-top:1rem; color: #94a3b8;">Si l'aperçu intégré est bloqué par votre navigateur, utilisez les boutons ci-dessus pour ouvrir ou télécharger le PDF.</p>
    </div>
</section>