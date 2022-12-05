<div class="post" <?php post_class();?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink()?>"><?php the_title() ;?></a>
                                </h2>
                                <?php echo '<span class="dashicons dashicons-format-gallery"></span>'; ?>
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
                                        // if(post_password_required()){
                                        //     echo "This post is password required";
                                        // }else{
                                        //     the_excerpt();
                                        // }
                                        the_excerpt();
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>