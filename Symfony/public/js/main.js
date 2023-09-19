document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('search-form');
    const searchInput = document.querySelector('.search-input');

    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Empêche le comportement par défaut de la touche Entrée
            searchForm.submit(); // Soumet le formulaire lorsque la touche Entrée est pressée
        }
    });

    const searchIconLink = document.getElementById('search-icon-link');

    searchIconLink.addEventListener('click', function (e) {
        e.preventDefault(); // Empêche le lien de naviguer vers une nouvelle page
        searchForm.submit(); // Soumet le formulaire lorsque l'icône est cliquée
    });
});