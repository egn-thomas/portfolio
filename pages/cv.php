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
            <button id="cv-toggle-preview" class="btn-secondary" style="margin-left:0.5rem">Afficher l'aperçu</button>
        </div>

        <div id="cv-preview-wrapper" style="margin:1.5rem 0; display:none">
            <h3>Aperçu</h3>
            <p>Si votre navigateur le permet, un aperçu du CV web est affiché ci-dessous. Si l'aperçu ne fonctionne pas, utilisez les boutons ci-dessus.</p>
            <div style="width:100%; height:800px; border:1px solid rgba(255,255,255,0.06); margin-top:1rem;">
                <iframe id="cv-preview-iframe" src="<?php echo $cv_web; ?>" style="width:100%; height:100%; border:0;" title="CV preview">Votre navigateur ne supporte pas l'aperçu intégré. Cliquez sur le bouton 'Voir le CV'.</iframe>
            </div>
        </div>

        <script>
        (function(){
            var btn = document.getElementById('cv-toggle-preview');
            var wrapper = document.getElementById('cv-preview-wrapper');
            var iframe = document.getElementById('cv-preview-iframe');
            btn && btn.addEventListener('click', function(){
                if (wrapper.style.display === 'none' || wrapper.style.display === '') {
                    wrapper.style.display = 'block';
                    btn.textContent = "Masquer l'aperçu";
                    iframe && (iframe.src = iframe.src);
                } else {
                    wrapper.style.display = 'none';
                    btn.textContent = "Afficher l'aperçu";
                }
            });
        })();
        </script>
    </div>
</section>