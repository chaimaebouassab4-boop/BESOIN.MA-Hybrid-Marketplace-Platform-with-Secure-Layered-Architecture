<?php
/**
 * ============================================================
 * BESOIN HELPER FUNCTIONS
 * Ajoute ces fonctions à la fin de ton functions.php existant
 * ============================================================
 */

/**
 * Get locations for the header dropdown.
 *
 * Currently returns static data for Zone A (no Laravel needed).
 * TODO: Replace with real API call when Laravel backend is connected.
 * Example future call: return besoin_api_fetch('/api/locations');
 *
 * @return array
 */
function besoin_get_locations() {
    // Phase 1 : données statiques (pas besoin de Laravel)
    return array(
        array('id' => 1, 'name' => 'Casablanca'),
        array('id' => 2, 'name' => 'Rabat'),
        array('id' => 3, 'name' => 'Marrakech'),
        array('id' => 4, 'name' => 'Fès'),
        array('id' => 5, 'name' => 'Tanger'),
        array('id' => 6, 'name' => 'Agadir'),
    );

    /*
    // Phase 2 : décommenter quand Laravel API est prête
    if ( function_exists('besoin_api_fetch_data') ) {
        return getLocations();
    }
    return array();
    */
}

/**
 * SVG icon: Keywords
 * Séparé pour garder header.php propre.
 */
function besoin_icon_keywords() {
    return '<svg width="14" height="14" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M1.50001 5.98828H1.48829V8.49844H8.51171V5.98828H1.50001ZM8.48827 1.79775V4.47497H7.51173V2.20266L7.50828 2.19921L6.30078 0.991711L6.29736 0.988289H3.98827V4.47497H3.01173V0.0117188H6.70224L8.48827 1.79775ZM0.511719 9.47501V5.01171H9.48828V9.47501H0.511719ZM6.98827 3.51171V4.48828H4.51173V3.51171H6.98827ZM5.98829 2.02502V3.00159H4.51173V2.02502H5.98829ZM1.51173 0.498422H2.48827V4.47497H1.51173V0.498422ZM3.51172 6.51171H6.48828V7.48828H3.51172V6.51171Z" fill="black" stroke="black" stroke-width="0.03125"/>
    </svg>';
}

/**
 * SVG icon: Location
 */
function besoin_icon_location() {
    return '<svg width="14" height="16" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M9.55978 18.82C9.39658 18.9372 9.20071 19.0003 8.99978 19.0003C8.79885 19.0003 8.60298 18.9372 8.43978 18.82C3.61078 15.378 -1.51422 8.298 3.66678 3.182C5.08912 1.78285 7.00462 0.999124 8.99978 1C10.9998 1 12.9188 1.785 14.3328 3.181C19.5138 8.297 14.3888 15.376 9.55978 18.82Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M9 10C9.53043 10 10.0391 9.78929 10.4142 9.41421C10.7893 9.03914 11 8.53043 11 8C11 7.46957 10.7893 6.96086 10.4142 6.58579C10.0391 6.21071 9.53043 6 9 6C8.46957 6 7.96086 6.21071 7.58579 6.58579C7.21071 6.96086 7 7.46957 7 8C7 8.53043 7.21071 9.03914 7.58579 9.41421C7.96086 9.78929 8.46957 10 9 10Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>';
}