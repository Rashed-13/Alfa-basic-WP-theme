<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("hero") ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="404-image">
                    <img src="http://localhost/alfa/wp-content/uploads/2022/12/404.jpg" alt="">
                </div>
                <div class="404-message">
                    <h2>The content you are looking for is not available</h2>
                </div>
            </div>
        </div>
    </div>
<?php ;?>


<?php get_footer();?>