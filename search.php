<?php get_header() ;?>
<body <?php body_class("rashed");?>>
<?php get_template_part("hero");?>
<?php 
    if( is_search() && ! have_posts() ) :?>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h3><?php _e("No Result Found");?></h3>
            </div>
        </div>
    <?php endif;
?>
<div class="posts">
<?php
    if(have_posts()){
        while(have_posts()){
            the_post();
                get_template_part("post-format/content", get_post_format());
        }
    }
?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <?php 
               the_posts_pagination( array( 'mid_size' => 3 ) );
            ?>
        </div>
    </div>
</div>
<?php get_footer();?>

