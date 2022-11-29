<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("hero");?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
        </div>
    </div>
</div>

<?php get_footer();?>