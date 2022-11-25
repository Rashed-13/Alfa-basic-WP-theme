<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("hero");?>
<div class="posts">
    <div class="post" <?php post_class();?>>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2 class="post-title text-center">
                        <?php the_title();?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <p>
                        <strong><?php the_post(); the_author(); rewind_posts()?></strong><br/>
                        <?php echo get_the_date();?>
                    </p>
                    <?php 
                        echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>");
                    ?>
                </div>
                <div class="col-md-10 offset-md-1">
                    <?php if(has_post_thumbnail()){
                        the_post_thumbnail("large", "class='img-fluid'");
                    } ?>
                    <p>
                        <?php 
                            the_content();
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php if(comments_open()):;?>
            <div class="col-md-10 offset-1">
                <?php 
                comments_template()?>
            </div>
        <?php endif;?>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-1">
        <?php 
            next_post_link('%link', 'Previous post'); 
        ?>
        </div>
        <div class="col-md-4 offset-md-1">
            <?php 
                previous_post_link('%link', 'Next post'); 
            ?>
        </div>
    </div>
</div>
<?php get_footer();?>