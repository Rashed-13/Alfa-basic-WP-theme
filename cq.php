<?php 
    /*
    Template Name: Custom Query
    */
?>
<?php get_header() ;?>
<body <?php body_class("rashed");?>>
<?php get_template_part("hero");

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;;
$post_ids = array(1,7,29,17,5,33);
$total = 8;
$post_per_page = 6;
$_p = get_posts(array(
    // 'post__in' => $post_ids,
    'author__in' => array(1),
    'numberposts' => $total,
    'order' => 'des',
    // 'orderby' => 'post__in',
    'posts_per_page' => $post_per_page,
    'paged' => $paged
));
    foreach($_p as $post){
        setup_postdata($post)?>
        <a href="<?php the_permalink();?>"><h2 class="text-center"><?php the_title();?></h2></a>
    <?php }
    wp_reset_postdata();
?>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php 
              echo paginate_links(array(
                'total' => 2,
                'show_all ' => true
                //'total' => 2 //ceil( $total / $post_per_page )
               ));
            ?>
        </div>
    </div>
</div>
<?php get_footer();?>

