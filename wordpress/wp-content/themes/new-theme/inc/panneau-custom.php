<?php

add_action('customize_register', 'fonction_cutomizer' );

function fonction_cutomizer($wp_customizer){

    $wp_customizer->add_panel("configuration_id", 
    array(
        'title'=>'Nombre post page Accueil',
        'description' => 'Configuration du nombre de post à afficher sur la page d\'accueil',
    ));

    $wp_customizer->add_section('configuration_id_section', 
    array(
        'panel'=>'configuration_id',
        'title' => 'mon panneau section',
        'description'=> 'ma section qui contiendra mon setting',
    ));

    $wp_customizer->add_setting('configuration_id_nombre', 
    array(
        'default'=>'3',
        'transport'=>'postMessage'
    ));

    $wp_customizer->add_control('configuration_id_nombre', 
    array(
        'label'=>'Changement du nombre de post à afficher',
        'section'=>'configuration_id_section',
        'type'=>'text',
    ));

    
}