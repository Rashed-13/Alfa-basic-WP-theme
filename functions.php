<?php 


function alfa_bootstrappig(){
    load_theme_textdomain("alfa");
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "alfa_bootstrappig");


function alfa_assets(){
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("alfa", get_stylesheet_uri());
}
add_action("wp_enqueue_scripts", "alfa_assets");


















?>