<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(current_theme_supports("custom-logo")):?>
                    <div class="logo text-center">
                        <?php the_custom_logo();?>
                    </div>
                <?php endif;?>
                <h3 class="tagline"><?php bloginfo("description");?></h3>
                <h1 class="align-self-center display-1 text-center heading">
                   <a href="<?php echo site_url() ;?>"> <?php bloginfo('name');?></a> 
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'headermenu',
                        "container" => "div",
                    ));
                ?>
            </div>
        </div>
    </div>
</div>