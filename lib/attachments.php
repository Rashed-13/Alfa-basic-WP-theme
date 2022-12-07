<?php
if (class_exists("Attachments")) {
    define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
    add_filter( 'attachments_default_instance', '__return_false' );


function alfa_post_slider_register($attachments){


    $fields = array(
        array(
            'type'      => 'text',
            'label'     => __( 'Title', 'alfa' ),    // label to display
            'name'      => 'title'
        ),
    );

    $args = array(
        'label'         => __("Slider Attachment", "alfa"),
        'post_type'     => array('post'),
        'position'      => 'normal',
        'filetype'      => 'image',
        'note'          => 'Attach files here!',
        'button_text'   => __( 'Add Image', 'alfa' ),
        'fields'        => $fields
    );


    $attachments->register('post_slider', $args);
}

add_action( 'attachments_register', 'alfa_post_slider_register');













}












?>