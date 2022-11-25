<?php get_header() ;?>
<body <?php body_class();?>>
<?php get_template_part("hero");?>
<div class="posts">
<?php
    if(have_posts()){
        while(have_posts()){
            the_post();?>
                <div class="post" <?php post_class();?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink()?>"><?php the_title() ;?></a>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>
                                    <strong><?php the_author();?></strong><br/>
                                    <?php echo get_the_date() ?>
                                </p>
                                <?php 
                                    echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>");
                                ?>
                            </div>
                            <div class="col-md-8">
                                <?php if(has_post_thumbnail()){
                                    the_post_thumbnail("large", "class='img-fluid'");
                                } ?>
                                <p>
                                    <?php 
                                        the_excerpt();
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
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