<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php wp_head();?>
</head>
<body <?php body_class();?>>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo("description");?></h3>
                <h1 class="align-self-center display-1 text-center heading"><?php bloginfo('name');?></h1>
            </div>
        </div>
    </div>
</div>
<div class="posts">
   
<?php
    if(have_posts()){
        while(have_posts()){
            the_post();?>
                <div class="post" <?php post_class();?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="post-title"><?php the_title() ;?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>
                                    <strong><?php the_author();?></strong><br/>
                                    15th May, 2018
                                </p>
                                <ul class="list-unstyled">
                                    <li>dhaka</li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                    <img class="img-fluid" src="https://images.pexels.com/photos/301929/pexels-photo-301929.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=800"
                                    alt="Post Title">
                                <p>
                                    <?php the_content();?>
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
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &copy; LWHH - All Rights Reserved
            </div>
        </div>
    </div>
</div>
<?php wp_footer();?>
</body>
</html>