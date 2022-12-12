<?php 
$comment_nu = get_comments_number();
?>


<h2>
    <?php
        if(1 == $comment_nu){
            _e("This post have 1 Comment", "alfa");
        }else{
            _e("This Post Have {$comment_nu} Comments", "alfa");
        }
    ?>
</h2>
<?php 
wp_list_comments();
if(!comments_open() ){
    _e("Comments are closed", "alfa");
}

comment_form();

the_comments_pagination();