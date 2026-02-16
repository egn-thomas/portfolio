document.addEventListener('DOMContentLoaded', function () {
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
      if (img.closest('.artwork-image-full')) {
        console.log('Processing artwork image:', img.src, w, h);
        // Calculer la taille proportionnelle
        var maxWidth = window.innerWidth * 0.8; // 50vw
        var maxHeight = window.innerHeight * 0.8; // 40vh
        
        var ratio = Math.min(maxWidth / w, maxHeight / h);
        var newWidth = w * ratio;
        var newHeight = h * ratio;
        
        console.log('New size:', newWidth, newHeight);
        img.style.display = 'none';
        img.style.width = newWidth + 'px';
        img.style.height = newHeight + 'px';
        img.style.objectFit = 'contain';
        img.style.objectPosition = 'center';
        img.style.borderRadius = '10px';
        img.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.3)';
        // Forcer le reflow
        img.offsetHeight;
        img.style.display = 'block';
      } else {
        // Pour les autres images (galerie), garder cover
        img.style.width = '100%';
        img.style.height = '100%';
        img.style.objectFit = 'cover';
        img.style.objectPosition = 'center';
        img.style.display = 'block';
      }
    }
    
    if (img.complete) {
      adjust();
    } else {
      img.addEventListener('load', adjust);
      img.addEventListener('error', adjust);
    }
  }

  function adaptTextColorToImage(img) {
    // Detect brightness of the image and adapt text color
    function calcBrightness() {
      try {
        var canvas = document.createElement('canvas');
        canvas.width = 50;
        canvas.height = 50;
        var ctx = canvas.getContext('2d');
        
        ctx.drawImage(img, 0, 0, 50, 50);
        var imageData = ctx.getImageData(0, 0, 50, 50);
        var data = imageData.data;
        
        var r = 0, g = 0, b = 0;
        for (var i = 0; i < data.length; i += 4) {
          r += data[i];
          g += data[i + 1];
          b += data[i + 2];
        }
        
        var pixelCount = data.length / 4;
        r = Math.floor(r / pixelCount);
        g = Math.floor(g / pixelCount);
        b = Math.floor(b / pixelCount);
        
        // Calculate luminance (https://www.w3.org/TR/AERT/#color-contrast)
        var luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;
        
        // Find the gallery-item parent and adjust text
        var galleryItem = img.closest('.gallery-item');
        if (galleryItem) {
          var content = galleryItem.querySelector('.item-content');
          if (content) {
            // If image is bright, use dark text; if dark, use light text
            if (luminance > 0.5) {
              content.style.color = '#0f172a';
            } else {
              content.style.color = '#f8fafc';
            }
          }
        }
      } catch (e) {
        // CORS issue or other error - do nothing
      }
    }
    
    if (img.complete) {
      calcBrightness();
    } else {
      img.addEventListener('load', calcBrightness);
    }
  }

  // Traiter toutes les images de galerie
  document.querySelectorAll('.gallery-item img, .item-image, .project-image img, .artwork-image-full img').forEach(function(img) {
    processImage(img);
    // Adapt text color for gallery items only
    if (img.classList.contains('item-image') || img.closest('.gallery-item')) {
      adaptTextColorToImage(img);
    }
  });
  
  // Observer pour les images ajoutées dynamiquement
  var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      mutation.addedNodes.forEach(function(node) {
        if (node.nodeType === 1) {
          node.querySelectorAll && node.querySelectorAll('.gallery-item img, .item-image, .project-image img, .artwork-image-full img').forEach(function(img) {
            processImage(img);
            if (img.classList.contains('item-image') || img.closest('.gallery-item')) {
              adaptTextColorToImage(img);
            }
          });
          if (node.matches && node.matches('.gallery-item img, .item-image, .project-image img, .artwork-image-full img')) {
            processImage(node);
            if (node.classList.contains('item-image') || node.closest('.gallery-item')) {
              adaptTextColorToImage(node);
            }
          }
        }
      });
    });
  });
  
  observer.observe(document.body, { childList: true, subtree: true });
});
