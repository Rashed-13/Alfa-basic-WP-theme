<?php 
    if(is_active_sidebar("sitebar1")){
        $alfa_layout_width = "col-md-8";
    }else{
        $alfa_layout_width = "col-md-10 offset-md-1";
    }
?>
<?php get_header();?>

<body <?php body_class();?>>
    <?php get_template_part("hero");?>
    <div class="container">
        <div class="row">
            <div class="<?php echo $alfa_layout_width;?>">
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
                                        <strong><?php the_post(); the_author_posts_link(); rewind_posts()?></strong><br />
                                        <?php echo get_the_date();?>
                                    </p>
                                    <?php 
                                    echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>");
                                ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Attachments</h2>
                                        <div class="my-slider">
                                        <?php 
                                            if(class_exists("Attachments")){
                                                $attachments = new Attachments("post_slider");
                                                if( $attachments->exist() ) : 
                                                    while( $attachment = $attachments->get() ) : 
                                                    ?><div><?php echo $attachments->image( 'large' );?></div> <?php 
                                                    endwhile; 
                                                endif; 
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <?php if(has_post_thumbnail()){
                                        $image_url = get_the_post_thumbnail_url(null, "large");
                                        // print_r($image_url);
                                        //echo '<a href="#" data-featherlight="'.$image_url.'">';
                                        printf("<a href='#' data-featherlight='%s'>", $image_url);
                                        the_post_thumbnail("large", "class=img-fluid");
                                        echo '</a>';

                                    } 

                                    the_content();
                                    // bellow function is for long post break pagination
                                    wp_link_pages();
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="author-section">
                                        <div class="authore-name">
                                            <h2 class="auth-heading">The author is <?php echo get_the_author_meta("nickname", 1);?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <?php if( ! post_password_required()):;?>
                        <div class="col-md-12">
                            <?php comments_template();?>
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
            <?php 
            if(is_active_sidebar('sitebar1')){ ?>
                <div class="col-md-4">
                <?php 
                    if(is_active_sidebar("sitebar1")){
                        dynamic_sidebar("sitebar1");
                    }
                ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php 
        // print_r(get_declared_classes());
    ;?>
    <?php get_footer();?>