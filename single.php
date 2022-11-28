<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("hero");?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="posts">
                <div class="post" <?php post_class();?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 ">
                                <h2 class="post-title text-center">
                                    <?php the_title();?>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>
                                    <strong><?php the_post(); the_author(); rewind_posts()?></strong><br/>
                                    <?php echo get_the_date();?>
                                </p>
                                <?php 
                                    echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>");
                                ?>
                            </div>
                            <div class="col-md-12">
                                <?php if(has_post_thumbnail()){
                                    $image_url = get_the_post_thumbnail_url(null, "large");
                                    // print_r($image_url);
                                     //echo '<a href="#" data-featherlight="'.$image_url.'">';
                                    printf("<a href='#' data-featherlight='%s'>", $image_url);
                                    the_post_thumbnail("large", "class=img-fluid");
                                    echo '</a>';
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
                        <div class="col-md-12">
                            <?php 
                            comments_template()?>
                        </div>
                    <?php endif;?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php 
                            next_post_link('%link', 'Previous post'); 
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php 
                            previous_post_link('%link', 'Next post'); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php 
                if(is_active_sidebar("sitebar1")){
                    dynamic_sidebar("sitebar1");
                }
            ?>
        </div>
    </div>
</div>

<?php get_footer();?>