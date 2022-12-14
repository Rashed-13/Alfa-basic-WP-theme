<?php 
    /*
    Template Name: Custom Query WP_Query 
    */
?>
<?php get_header() ;?>
<body <?php body_class("rashed");?>>
<?php get_template_part("hero");

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;;
$post_ids = array(1,7,29,17,5,33);
$total = 8;
$post_per_page = 6;
$_p = new WP_Query(array(
    // 'post__in' => $post_ids,
    // 'author__in' => array(1),
    // 'numberposts' => $total,
    // 'order' => 'des',
    // 'orderby' => 'post__in',
    // 'category_name' => 'news',
    // 'tag' => 'new'
    // 'tax_query' => array(
    //     'relation' => "OR",
    //     array(
    //         'taxonomy' =>"category",
    //         "field" => "slug",
    //         'terms' => array('news'),
    //     ),
    //     array(
    //         'taxonomy' =>"post_tag",
    //         "field" => "slug",
    //         'terms' => array('new'),
    //     )
    // )
    // 'monthnum' => 11,
    // 'year' => 2022,
    // 'post_status' => "draft",
    'posts_per_page' => $post_per_page,
    'paged' => $paged,
    // 'tax_query'=> array(
    //     'relation' => "OR",
    //     array(
    //         'taxonomy' => 'post_format',
    //         'field' => 'slug',
    //         'terms' => array(
    //             'post-format-audio',
    //             'post-format-image',
    //             'post-format-gallery',
                
    //         ),
    //         'operator' => "NOT IN",
    //     ),
    // )

    // search based on meta data
    // 'meta_key' => "featured",
    // 'meta_value' => 1

    // search based on meta data relation

    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => "featured",
            'value'=> 1,
            'compear' => "="
        ),
        array(
            'key' => "homepage",
            'value'=> 1,
            'compear' => "="
        )
    )




));
    while($_p->have_posts()){
       $_p->the_post()?>
        <a href="<?php the_permalink();?>"><h2 class="text-center"><?php the_title();?></h2></a>
    <?php }
    wp_reset_query();
?>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php 
                echo paginate_links(array(
                    'total' => $_p->max_num_pages,
                    'current'=> $paged 
                ));
            ?>
        </div>
    </div>
</div>
<?php get_footer();?>

