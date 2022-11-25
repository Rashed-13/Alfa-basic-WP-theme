<?php 

function alfa_bootstrappig(){
    load_theme_textdomain("alfa");
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "alfa_bootstrappig");

function alfa_assets(){
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("alfa", get_stylesheet_uri(), null,the_date(), null);
}
add_action("wp_enqueue_scripts", "alfa_assets");



function alfa_sidebar(){
    register_sidebar(array(
        "name"          => __('Single post sitebar', 'alfa'),
        "id"            => "sitebar1",
        "description"   => __("Right sitebar 1", "alfa"),
        "before_widget" => "<div>",
        "after_widget"  => "</div>",
        "before_title"  => "<h2>",
        "after_title"   => "</h2>",
        "before_sidebar"=> "<section>",
        "after_sidebar" => "</section>"
    ));
}
add_action("widgets_init", "alfa_sidebar")


















?>