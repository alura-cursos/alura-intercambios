<?php

function alura_intercambios_registrando_taxonomia(){
    register_taxonomy(
        'paises',
        'destinos',
        array(
            'labels' => array('name' => 'Países'),
            'hierarchical' => true
        )
    );
}
add_action('init','alura_intercambios_registrando_taxonomia');

function alura_intercambios_registrando_post_customizado()
{
    register_post_type('destinos',
        array(
            'labels' => array('name' => 'Destinos'),
            'public' => true,
            'menu_position' => 0,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-admin-site'
        )
    );
}
add_action('init','alura_intercambios_registrando_post_customizado');

function alura_intercambios_adicionando_recursos_ao_tema()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'alura_intercambios_adicionando_recursos_ao_tema');

function alura_intercambios_registrando_menu()
{
    register_nav_menu(
        'menu-navegacao',
        'Menu navegação'
    );
}

add_action('init', 'alura_intercambios_registrando_menu');

function alura_intercambios_registrando_post_customizado_banner(){
    register_post_type(
        'banners',
        array(
          'labels' => array('name' => 'Banner'),
          'public' => true,
          'menu_position' => 1,
          'menu_icon' => 'dashicons-format-image',
          'supports'=> array('title','thumbnail')
        )
    );
}
add_action('init','alura_intercambios_registrando_post_customizado_banner');

function alura_intercambios_registrando_metabox(){
    add_meta_box(
        'ai_registrando_metabox',
        'Texto para a home',
        'ai_funcao_callback',
        'banners'
    );
}
add_action('add_meta_boxes','alura_intercambios_registrando_metabox');

function ai_funcao_callback($post){
    ?>
    <label for="texto_home_1">Texto 1</label>
    <input type="text" name="texto_home_1" style="width: 100%"/>
    <br>
    <br>
    <label for="texto_home_2">Texto 2</label>
    <input type="text" name="texto_home_2" style="width: 100%"/>
    <?php
}