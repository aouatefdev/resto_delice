
document.addEventListener('DOMContentLoaded', function() {
    // Vérifier si c'est la première fois que le site est chargé
    const isFirstLoad = localStorage.getItem('isFirstLoad') === null;
  
    // Sélectionner l'élément de la fenêtre
    const windowElement = document.getElementById('myWindow');
  
    // Fonction pour ouvrir la fenêtre
    function openWindow() {
      windowElement.classList.add('open');
      windowElement.classList.remove('hidden');
    }
  
    // Fonction pour fermer la fenêtre
    function closeWindow() {
      windowElement.classList.remove('open');
      windowElement.classList.add('hidden');
    }
  
    // Si c'est la première fois que le site est chargé, ouvrir la fenêtre
    if (isFirstLoad) {
      openWindow(); 
      // Enregistrer la variable de contrôle pour indiquer que le site a été chargé une fois
      localStorage.setItem('isFirstLoad', 'true');
    } else {
      // Fermer la fenêtre lors des actualisations ultérieures
      closeWindow();
    }
  
    // Lier le bouton à la fonction de basculement
    const toggleButton = document.getElementById('toggleButton');

    toggleButton.addEventListener('click', function() {
      if (windowElement.classList.contains('open')) {
        closeWindow();
      } else {
        openWindow();
      }
    });

});

 
let successMessage = document.getElementById('success-message');

if (successMessage) {
    setTimeout(function() {
        successMessage.style.display = 'none';
    }, 3000); // 3000 millisecondes = 3 secondes
}
