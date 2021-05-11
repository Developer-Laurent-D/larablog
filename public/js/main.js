'use strict';

const searchForm = document.querySelector('#search-user');
const searchInput = document.querySelector('#search');
const tbody = document.querySelector('#user-list tbody');
const BASE_URL = 'https://laurentdhoye.sites.3wa.io/développement/php/m04/cours/laravel/public';

// Désactivation de la soumission du formulaire
searchForm.addEventListener('submit', (event) => {
    event.preventDefault();
});

searchInput.addEventListener('keyup', () => {
    const search = searchInput.value;
    
    fetch(`${BASE_URL}/ajax/users?search=${search}`).then(response => response.text()).then(results => {
        tbody.innerHTML = results;
    });
});