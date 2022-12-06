<?php get_header() ;?>
<body <?php body_class("rashed");?>>
<?php get_template_part("hero");?>
<div class="posts">
    <h2 class="text-center"> In Tags  <?php echo get_the_tag_list();?></h2>
<?php
    if(have_posts()){
        while(have_posts()){
            the_post();?>
            <a href="<?php the_permalink();?>"><h2 class="text-center"><?php the_title();?></h2></a>
        <?php }
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

