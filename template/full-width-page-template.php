<?php
/* Template Name: Example Template */
 get_header();
?>

<body <?php body_class();?>>
    <?php get_template_part("hero1");?>
    <div class="posts">
        <div class="post" <?php post_class();?>>
            <div class="container">
            <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <?php 
                            wp_nav_menu(array(
                                "theme_location" => "headermenu",
                                "menu_class" =>"menu text-center",
                                "container" => "div"
                            ));
                          ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center"><?php the_title();?></h2>
                        <p class="text-center">
                            <strong>
                                <?php the_post(); the_author(); rewind_posts()?></strong><br />
                            <?php echo get_the_date();?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <p>
                            <?php 
                        if(has_post_thumbnail()){
                             the_post_thumbnail("large", "class=img-fluid");
                        } ?>
                        </p>
                        <div class="row">
                        </div>
                        <p><?php the_content();?></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <?php get_footer();?>