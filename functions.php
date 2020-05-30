<?php

function alura_intercambios_registrando_menu(){
    register_nav_menu(
        'menu-navegacao',
        'Menu navegação'
    );
}
add_action('init', 'alura_intercambios_registrando_menu');