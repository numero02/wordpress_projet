<?php
/**
 * Plugin Name: Widget Immobilier
 * Author: Walid drihem
 * Description: mon widget pour afficher mes propriétés
 * Version: 1
 */
require(plugin_dir_path(__FILE__).'/inc/widget.class.php');

add_action('widgets_init', function(){
    register_widget('Mon_widget');  
   
});