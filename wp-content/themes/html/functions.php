<?php


 /* ADD theme support for logo */
add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,

 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
'unlink-homepage-logo' => true, 
 );
//  add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup'); 


add_filter('get_custom_logo', 'change_logo_class');
function change_logo_class($html)
{
 $html = str_replace('custom-logo', '', $html);
 $html = str_replace('-link', 'navbar-brand mainLogo d-none d-md-block', $html);
 
 
 return $html;
}


//Add Menus
function register_my_menus() {   
    register_nav_menus(
      array(
        'menu' => __( 'Header Menu' ),
        'extra-menu' => __( 'Extra Menu' )
       )
     );
   }
   add_action( 'init', 'register_my_menus' );




function add_additional_class_on_li($classes, $item, $args)
{
 if (isset($args->add_li_class)) {
 $classes[] = $args->add_li_class;
 }
 return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);



function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

function customtheme_add_woocommerce_support()
 {
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );




remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 30 );

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// remove_action('woocommerce_single_product_summary', 'woocommerce_product_meta_end', 40 );






?>