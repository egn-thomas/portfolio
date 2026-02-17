document.addEventListener("DOMContentLoaded", function () {
  function processImage(img) {
    // Attendre que l'image soit vraiment chargée
    function adjust() {
      var w = img.naturalWidth;
      var h = img.naturalHeight;

      if (!w || !h) {
        // Si les dimensions naturelles ne sont pas disponibles, réessayer dans 100ms
        setTimeout(adjust, 100);
        return;
      }

      // Pour les artworks, utiliser contain pour ne pas couper
      if (img.closest(".artwork-image-full")) {
        console.log("Processing artwork image:", img.src, w, h);
        // Calculer la taille proportionnelle
        var maxWidth = window.innerWidth * 0.8; // 50vw
        var maxHeight = window.innerHeight * 0.8; // 40vh

        var ratio = Math.min(maxWidth / w, maxHeight / h);
        var newWidth = w * ratio;
        var newHeight = h * ratio;

        console.log("New size:", newWidth, newHeight);
        img.style.display = "none";
        img.style.width = newWidth + "px";
        img.style.height = newHeight + "px";
        img.style.objectFit = "contain";
        img.style.objectPosition = "center";
        img.style.borderRadius = "10px";
        img.style.boxShadow = "0 10px 30px rgba(0, 0, 0, 0.3)";
        // Forcer le reflow
        img.offsetHeight;
        img.style.display = "block";
      } else {
        // Pour les autres images (galerie), garder cover
        img.style.width = "100%";
        img.style.height = "100%";
        img.style.objectFit = "cover";
        img.style.objectPosition = "center";
        img.style.display = "block";
      }
    }

    if (img.complete) {
      adjust();
    } else {
      img.addEventListener("load", adjust);
      img.addEventListener("error", adjust);
    }
  }

  // Traiter toutes les images de galerie
  document
    .querySelectorAll(
      ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
    )
    .forEach(function (img) {
      processImage(img);
    });

  // Observer pour les images ajoutées dynamiquement
  var observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      mutation.addedNodes.forEach(function (node) {
        if (node.nodeType === 1) {
          node.querySelectorAll &&
            node
              .querySelectorAll(
                ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
              )
              .forEach(function (img) {
                processImage(img);
              });
          if (
            node.matches &&
            node.matches(
              ".gallery-item img, .item-image, .project-image img, .artwork-image-full img",
            )
          ) {
            processImage(node);
          }
        }
      });
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });
});
