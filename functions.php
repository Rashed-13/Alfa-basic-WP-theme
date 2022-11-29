<?php 
if(site_url() == "http://localhost/alfa"){
    define("VERSION", time());
}else{
    define("VERSION", wp_get_theme()->version);
}

function alfa_bootstrappig(){
    load_theme_textdomain("alfa");
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");

    // register_nav_menu("headermenu", __("Top menu", 'alfa'));
    // register_nav_menu("footermenu", __("Footer menu", 'alfa'));

    register_nav_menus(array(
        "headermenu" => __("Top menu", 'alfa'),
        "footermenu" => __("Footer menu", 'alfa')
    ));
}

add_action("after_setup_theme", "alfa_bootstrappig");

function alfa_assets(){
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("alfa", get_stylesheet_uri(), null, VERSION, "all");
    wp_enqueue_style("fatherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");

    wp_enqueue_script("fatherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "1.1.0", true);
    wp_enqueue_script("main-js", get_template_directory_uri()."/assats/js/app.js", null, VERSION, true);
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
        "after_sidebar" => "</section>",
    ));

    register_sidebar(array(
        "name"          => __('Footer left', 'alfa'),
        "id"            => "footer-left",
        "description"   => __("Footer left sitebar","alfa"),
        "befor_sidebar" => "<section>",
        "after_sidebar" => "<section>",
        "before_widget" => "<div>",
        "after_widget"  =>"</div>",
        "before_title"  =>"<p>",
        "after_title" => "</p>"
    ));

    register_sidebar(array(
        "name"          => __("Footer right", "alfa"),
        "description"   => __("Footer right sitebar", 'alfa'),
        "id"            => "footer-right",
        "befor_sidebar" => "<section>",
        "after_sidebar" => "<section>",
        "before_widget" => "<div>",
        "after_widget"  =>"</div>",
        "before_title"  =>"<p>",
        "after_title" => "</p>"
    ));
}
add_action("widgets_init", "alfa_sidebar");

function alfa_modifing_excerpt($excerpt){
    if(post_password_required()){
        return get_the_password_form();
    }else{
        return $excerpt;
    }
}
add_filter("the_excerpt", "alfa_modifing_excerpt");

function alfa_protected_title_format_modification(){
    return "%s";
}
add_filter("protected_title_format", "alfa_protected_title_format_modification");

function alfa_adding_css_class_to_li($classes){
    $classes[] = "Rashed";
    return $classes;
}
add_filter("nav_menu_css_class", "alfa_adding_css_class_to_li", 10, 1);

function remove_max_srcset_image_width(  ) {
    return 1;
}
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

function alfa_add_custom_css_block_in_head(){
    ?>
        <style>
            h1.heading a{
                color: red;
            }
        </style>
    <?php
    //or
    // echo "<style>
    //         h1.heading a{
    //         color: red;}
    //     </style>";
}
add_action("wp_head", "alfa_add_custom_css_block_in_head", 11);



















?>