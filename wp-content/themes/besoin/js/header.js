/**
 * BESOIN HEADER - JavaScript
 * Gestion des dropdowns Keywords et Location
 * Fichier: /js/header.js
 */

document.addEventListener('DOMContentLoaded', function () {

    // ── KEYWORDS DROPDOWN ──
    const keywordsItems = document.querySelectorAll('.keywords-item');
    const keywordsLabel = document.getElementById('keywords-label');
    const srchType      = document.getElementById('srch_type');

    keywordsItems.forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const value = this.dataset.value || this.closest('li').dataset.value;
            const label = this.textContent.trim();

            if (keywordsLabel) keywordsLabel.textContent = label;
            if (srchType)      srchType.value = value;

            // Fermer le dropdown Bootstrap
            const dropdown = document.getElementById('keywordsDropdown');
            if (dropdown) {
                const bsDropdown = bootstrap.Dropdown.getInstance(dropdown);
                if (bsDropdown) bsDropdown.hide();
            }
        });
    });

    // ── LOCATION DROPDOWN ──
    const locationItems = document.querySelectorAll('.location-item');
    const locationLabel = document.getElementById('location-label');
    const srchLocation  = document.getElementById('srch_location');

    locationItems.forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const value = this.closest('li').dataset.value;
            const label = this.textContent.trim();

            if (locationLabel) locationLabel.textContent = label;
            if (srchLocation)  srchLocation.value = value;

            // Fermer le dropdown Bootstrap
            const dropdown = document.getElementById('locationDropdown');
            if (dropdown) {
                const bsDropdown = bootstrap.Dropdown.getInstance(dropdown);
                if (bsDropdown) bsDropdown.hide();
            }
        });
    });

    // ── SEARCH BUTTON (déclenche le formulaire) ──
    const searchForm = document.getElementById('besoin-search-form');
    const searchBtn  = document.getElementById('srch_button');

    if (searchBtn && searchForm) {
        searchBtn.addEventListener('click', function () {
            searchForm.submit();
        });
    }

    // ── ENTER KEY sur l'input ──
    const searchInput = document.getElementById('search-input');
    if (searchInput && searchForm) {
        searchInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                searchForm.submit();
            }
        });
    }
});