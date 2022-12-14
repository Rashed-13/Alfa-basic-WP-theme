<?php
require_once "lib/attachments.php";

if (site_url() == "http://localhost/alfa") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->version);
}

// $alfa_page_base_name = basename( get_page_template());
// print_r($alfa_page_base_name);


function alfa_bootstrappig() {
    load_theme_textdomain("alfa");
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");

    $alfa_defaults = array(
        'default-text-color' => '#2e00d8',
        'header-text' => true,
    );
    add_theme_support("custom-header", $alfa_defaults);
    $alfa_default_logo_size =array(
        "width" => 150,
        "height" => 150
    );
    add_theme_support("custom-logo", $alfa_default_logo_size);
    add_theme_support("custom-background");
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );
    add_theme_support( 'html5', array( 'search-form' ) );
    // register_nav_menu("headermenu", __("Top menu", 'alfa'));
    // register_nav_menu("footermenu", __("Footer menu", 'alfa'));

    register_nav_menus(array(
        "headermenu" => __("Top menu", 'alfa'),
        "footermenu" => __("Footer menu", 'alfa'),
    ));
}

add_action("after_setup_theme", "alfa_bootstrappig");

function alfa_assets() {
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("fatherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
    wp_enqueue_style("tiny-slider-css", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css", null, "1.1.0");
    wp_enqueue_style("dashicon");
    wp_enqueue_style("alfa", get_stylesheet_uri(), null, VERSION, "all");

    wp_enqueue_script("fatherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "1.1.0", true);
    wp_enqueue_script("tiny-slider-js", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", null, VERSION, true);
    wp_enqueue_script("main-js", get_template_directory_uri() . "/assats/js/app.js", null, "1.1.2", true);
}
add_action("wp_enqueue_scripts", "alfa_assets");

function alfa_sidebar() {
    register_sidebar(array(
        "name" => __('Single post sitebar', 'alfa'),
        "id" => "sitebar1",
        "description" => __("Right sitebar 1", "alfa"),
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => "<h2>",
        "after_title" => "</h2>",
        "before_sidebar" => "<section>",
        "after_sidebar" => "</section>",
    ));

    register_sidebar(array(
        "name" => __('Footer left', 'alfa'),
        "id" => "footer-left",
        "description" => __("Footer left sitebar", "alfa"),
        "befor_sidebar" => "<section>",
        "after_sidebar" => "<section>",
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => "<p>",
        "after_title" => "</p>",
    ));

    register_sidebar(array(
        "name" => __("Footer right", "alfa"),
        "description" => __("Footer right sitebar", 'alfa'),
        "id" => "footer-right",
        "befor_sidebar" => "<section>",
        "after_sidebar" => "<section>",
        "before_widget" => "<div>",
        "after_widget" => "</div>",
        "before_title" => "<p>",
        "after_title" => "</p>",
    ));
}
add_action("widgets_init", "alfa_sidebar");

function alfa_modifing_excerpt($excerpt) {
    if (post_password_required()) {
        return get_the_password_form();
    } else {
        return $excerpt;
    }
}
add_filter("the_excerpt", "alfa_modifing_excerpt");

function alfa_protected_title_format_modification() {
    return "%s";
}
add_filter("protected_title_format", "alfa_protected_title_format_modification");

function alfa_adding_css_class_to_li($classes) {
    $classes[] = "Rashed";
    return $classes;
}
add_filter("nav_menu_css_class", "alfa_adding_css_class_to_li", 10, 1);

function remove_max_srcset_image_width() {
    return 1;
}
add_filter('max_srcset_image_width', 'remove_max_srcset_image_width');

function alfa_add_custom_css_block_in_head() {
    if(is_page()){
        $alfa_feature_image = get_the_post_thumbnail_url();
        ?>
            <style>
                .page-header{
                    background-image: url(<?php echo esc_url($alfa_feature_image);?>);
                }
            </style>
        <?php
    }
    if(is_front_page()){
        if(current_theme_supports("custom-header")){
            ?>
            <style>
                .header{
                    background-image: url(<?php echo header_image();?>);
                    background-size: cover;
                    background-repeat: no-repeat;
                    margin-bottom: 50px;
                }
                .header h1.heading a, h3.tagline{
                    color: #<?php echo get_header_textcolor()?>;
                    <?php
                    if( ! display_header_text()){
                    echo "display: none";
                    }
                    ?>
                }
            </style>
        <?php
        }
    }

    //or
    // echo "<style>
    //         h1.heading a{
    //         color: red;}
    //     </style>";
}
add_action("wp_head", "alfa_add_custom_css_block_in_head", 11);


function alfa_removing_class_from_body($classes){
    unset($classes[array_search("rashed", $classes)]);
    return $classes;
}
add_filter("body_class", "alfa_removing_class_from_body");



function alfa_highlighiting_search_result($text){
    if(is_search()){
        $a = trim(get_search_query());
        if(!empty($a)){
            $pattern = '/('.join('|',explode(' ', $a)).')/i';
            $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
        }
    }
    return $text;
}

add_filter('the_title', "alfa_highlighiting_search_result");
add_filter('the_excerpt', "alfa_highlighiting_search_result");
add_filter('the_content', "alfa_highlighiting_search_result");




// Hidding some posts from blog page Not from Dashboard

function alfa_post_hidding_from_blog_page_Not_from_admin_page($main_post_query){
    // if we Don't do this check then this hook will remove all post based on condition from blog page and admin page also, this check just remove from blog page not from admin
    if(is_home() && $main_post_query->is_main_query( )){
        $main_post_query->set('tag__not_in', array(2));
    }
}


add_action('pre_get_posts', 'alfa_post_hidding_from_blog_page_Not_from_admin_page');