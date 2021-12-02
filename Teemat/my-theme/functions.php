<?php

add_action('init', function() {
    
    wp_enqueue_style('my-theme-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('my-theme-style', get_template_directory_uri() . '/style.css');
   
    add_theme_support("widgets");
    add_theme_support("menus");
    add_theme_support("post-thumbnails");
    add_image_size('post-preview', 280,280, true);

    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
        )
    );
    
});

#rekisteröi ja lisää skriptit
add_action("wp_enqueue_scripts", function() {
    wp_enqueue_script('my-theme-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), "", true);  
    wp_enqueue_script("'my-theme-script",  get_template_directory_uri() . "/assets/js/script.js", array("jquery"), null, true);   
});



add_action( 'widgets_init', function (){
    register_sidebar( array(
                            # __( => funktio jota pakko käyttää jos käyttää muita kieliä
        'name'          => __( 'Primary Sidebar'), #Nimi admin-tilassa
        'id'            => 'sidebar-1', #tähän viitataan ohjelmakoodissa
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        ) 
    );
 
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 1'),
        'id'            => 'footer-sidebar-1',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        ) 
    );

    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 2'),
        'id'            => 'footer-sidebar-2 ',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        )
    ); 

    register_sidebar( array(
        'name'          => __( 'Bottom Footer Sidebar'),
        'id'            => 'bottom-footer-sidebar',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        )         
    );   
});


add_action( 'customize_register', function ($wp_customize ) {

    // slider osio customizer API:iin. Slideri sisältää 3 kuvaa
    $wp_customize->add_section( 'mytheme_slider_settings', array(
        'title' => __( 'Slider Image Settings' ),
        'description' => __( 'Edit slider image settings' ),
        //'panel' => '', // Not typically needed.
        'priority' => 160,
        'capability' => 'edit_theme_options', //
        //'theme_supports' => '', // Rarely needed.
        ) 
    );

    // Sliderin aktivointi/deaktivointi
    $wp_customize->add_setting( 'mytheme_slider_activate', array(
        'type' => 'theme_mod', // or 'option' ,, option = settings permanent, 
        'capability' => 'edit_theme_options',
        //'theme_supports' => '', // Rarely needed.
        'default' => '1', // 1 = checked
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        //'sanitize_js_callback' => '', // Basically to_json.
        ) 
    );

    $wp_customize->add_control('mytheme_slider_activate',array(
        'type'      => 'checkbox',
        'section'    => 'mytheme_slider_settings',
        "label" => __( 'Activate Image Slider'),
        'input_attrs' => array(
            'class' => 'my-custom.js',
            'style' => ""
        ),
    ));

    // 1. kuvan valinta
    $wp_customize->add_setting( 'mytheme_slider_image_1', array(
        'type' => 'theme_mod', // or 'option' ,, option = settings permanent, 
        'capability' => 'edit_theme_options',
        //'theme_supports' => '', // Rarely needed.
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        //'sanitize_js_callback' => '', // Basically to_json.
        ) 
    );
    
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'mytheme_slider_image_1',
            array(
                'label'      => __( 'Slider Image 1'),
                'section'    => 'mytheme_slider_settings',
                // katso inspectorilla sliderin koot
                'height'=>200, // cropper Height
                'width'=>1000, // Cropper Width
                // > True voi muutttaa resoluutioita
                'flex_width'=>false, //Flexible Width 
                'flex_height'=>false, // Flexible Heiht
            )
        )
    ); 
     // 1. kuvan otsikko
     $wp_customize->add_setting( 'mytheme_slider_header_text_1', array(
        'type' => 'theme_mod', // or 'option' ,, option = settings permanent, 
        'capability' => 'edit_theme_options',
        //'theme_supports' => '', // Rarely needed.
        'default' => '', 
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        //'sanitize_js_callback' => '', // Basically to_json.
        ) 
    );

    $wp_customize->add_control('mytheme_slider_header_text_1',array(
        'type'      => 'text',
        'section'    => 'mytheme_slider_settings',
        'input_attrs' => array(
            'class' => 'my-custom.js',
            'style' => "",
            'placeholder' => "Image 1 header",
        ),
    ));

    // 1. kuvan tekstisisältö
    $wp_customize->add_setting( 'mytheme_slider_content_text_1', array(
        'type' => 'theme_mod', // or 'option' ,, option = settings permanent, 
        'capability' => 'edit_theme_options',
        //'theme_supports' => '', // Rarely needed.
        'default' => '', 
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        //'sanitize_js_callback' => '', // Basically to_json.
        ) 
    );   

    $wp_customize->add_control('mytheme_slider_content_text_1',array(
        'type'      => 'textarea',
        'section'    => 'mytheme_slider_settings',
        'input_attrs' => array(
            'class' => 'my-custom.js',
            'style' => "",
            'placeholder' => "Image 1 header",
        ),
    ));    

    // 2. kuvan valinta
    $wp_customize->add_setting( 'mytheme_slider_image_2', array(
        'type' => 'theme_mod', 
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'mytheme_slider_image_2',
            array(
                'label'      => __( 'Slider Image 2'),
                'section'    => 'mytheme_slider_settings',
                'height'=>200, 
                'width'=>1000, 
                'flex_width'=>false, 
                'flex_height'=>false, 
            )
        )
    );    

    // 2. kuvan otsikko
    $wp_customize->add_setting( 'mytheme_slider_header_text_2', array(
        'type' => 'theme_mod', // or 'option' ,, option = settings permanent, 
        'capability' => 'edit_theme_options',
        //'theme_supports' => '', // Rarely needed.
        'default' => '', 
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        //'sanitize_js_callback' => '', // Basically to_json.
        ) 
    );

    $wp_customize->add_control('mytheme_slider_header_text_2',array(
        'type'      => 'text',
        'section'    => 'mytheme_slider_settings',
        'input_attrs' => array(
            'class' => 'my-custom.js',
            'style' => "",
            'placeholder' => "Image 2 header",
        ),
    ));   

    // 2. kuvan tekstisisältö
    $wp_customize->add_setting( 'mytheme_slider_content_text_2', array(
        'type' => 'theme_mod', // or 'option' ,, option = settings permanent, 
        'capability' => 'edit_theme_options',
        //'theme_supports' => '', // Rarely needed.
        'default' => '', 
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        //'sanitize_js_callback' => '', // Basically to_json.
        ) 
    );

    $wp_customize->add_control('mytheme_slider_content_text_2',array(
        'type'      => 'textarea',
        'section'    => 'mytheme_slider_settings',
        'input_attrs' => array(
            'class' => 'my-custom.js',
            'style' => "",
            'placeholder' => "Image 2 content",
        ),
    ));  



    // 3. kuvan valinta
    $wp_customize->add_setting( 'mytheme_slider_image_3', array(
        'type' => 'theme_mod', 
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'mytheme_slider_image_3',
            array(
                'label'      => __( 'Slider Image 3'),
                'section'    => 'mytheme_slider_settings',
                'height'=>200, 
                'width'=>1000, 
                'flex_width'=>false, 
                'flex_height'=>false, 
            )
        )
    );

    // 3. kuvan otsikko
    $wp_customize->add_setting( 'mytheme_slider_header_text_3', array(
        'type' => 'theme_mod', // or 'option' ,, option = settings permanent, 
        'capability' => 'edit_theme_options',
        //'theme_supports' => '', // Rarely needed.
        'default' => '', 
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        //'sanitize_js_callback' => '', // Basically to_json.
        ) 
    );

    $wp_customize->add_control('mytheme_slider_header_text_3',array(
        'type'      => 'text',
        'section'    => 'mytheme_slider_settings',
        'input_attrs' => array(
            'class' => 'my-custom.js',
            'style' => "",
            'placeholder' => "Image 3 header",
        ),
    )); 

    // 3. kuvan tekstisisältö
    $wp_customize->add_setting( 'mytheme_slider_content_text_3', array(
        'type' => 'theme_mod', // or 'option' ,, option = settings permanent, 
        'capability' => 'edit_theme_options',
        //'theme_supports' => '', // Rarely needed.
        'default' => '', 
        'transport' => 'refresh', // or postMessage
        'sanitize_callback' => 'sanitize_text_field',
        //'sanitize_js_callback' => '', // Basically to_json.
        ) 
    );    

    $wp_customize->add_control('mytheme_slider_content_text_3',array(
        'type'      => 'textarea',
        'section'    => 'mytheme_slider_settings',
        'input_attrs' => array(
            'class' => 'my-custom.js',
            'style' => "",
            'placeholder' => "Image 3 content",
        ),
    )); 
}); 
   
add_action('after_setup_theme', function() {

    $defaults = array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array( 'set-title', 'site-description'),
        'unlink-homepage-logo' => false

    );

    add_theme_support('custom-logo', $defaults);
});

require get_template_directory() . '/classes/nav-walker.php';
require get_template_directory() . '/classes/widgets.php';

?>