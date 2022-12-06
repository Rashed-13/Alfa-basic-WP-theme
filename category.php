<?php get_header() ;?>
<body <?php body_class("rashed");?>>
<?php get_template_part("hero");?>
<div class="posts">
    <h2 class="text-center"> In Category  <?php echo get_the_category_list();?></h2>
<?php
    if(have_posts()){
        while(have_posts()){
            the_post();
                the_title("<h2 class='text-center'>","</h2>");
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
