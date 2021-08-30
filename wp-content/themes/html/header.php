<?php
/**
 * Header file for the Mytheme .
 *
 * 
 * @package WordPress
 * @subpackage Infostride
 * @since 1.0
 */

?>


<!DOCTYPE html>
<html <?php echo language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <title><?php echo get_bloginfo('name')." | ".get_bloginfo('description') ?> </title>
  
  <?php wp_head(); ?>
    <!-- Bootstrap CSSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="<?php bloginfo('template_url'); ?>/css/custom.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/responsive.css" rel="stylesheet">
<!-- Font Awesome CSSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
   
<sccript type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/jquery.js'; ?>">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">


  </head>
  <body <?php body_class(); ?> >
 

    <header>

      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <a class="navbar-brand mobileLogo ms-auto d-md-none" href="#"><img src="./images/logo.png" alt="logo"/></a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

          
        <?php 
        wp_nav_menu(
            array(
          
              'extra-menu'  => 'first-menu',
              'menu_class' =>'navbar-nav me-auto mb-2 mb-lg-0',
              'add_li_class'=>'nav-item',
              'add_a_class'     => 'nav-link',
              'container' => '',
              
              
              )
            );
        ?>
            
        <?php the_custom_logo() ?>
            <!-- <a class="navbar-brand mainLogo d-none d-md-block" href="#"><img src="http://localhost/htmlsite/wp-content/uploads/2021/08/logo.png" alt="logo"></a> -->
	

        <?php 
        wp_nav_menu(
        array(
          
          'menu'  => 'second-menu',
              'menu_class' =>'navbar-nav ms-auto mb-2 mb-lg-0',
              'ul_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
              'add_li_class'=>'nav-item',
              'add_a_class'     => 'nav-link',
              'container' => '',
        
            )
          );
        ?>   
        </div>
        </div>
      </nav>    
       
    </header>
<div class="container">
    
