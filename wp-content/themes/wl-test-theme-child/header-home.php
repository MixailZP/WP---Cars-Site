<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
    <header class="header">
        <div class="logo"> 
            <?php if( has_custom_logo() ): the_custom_logo(); ?>
            <?php else: ?>
                <a  href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
            
                
            <!--Вывод номера телефона--->
            <?php 
            $tel = get_option('title_tagline_phone');
            if($tel != null){ ?>
                <div class="phone-number"><i class="fa fa-phone" aria-hidden="true"></i><?php echo get_theme_mod('title_tagline_phone'); ?></div>
            <?php } ?>

            <div class="phone-number">
                <?php echo get_theme_mod('title_tagline_phone'); ?> <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
        </div>

        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
            <li><a href="<?php echo get_permalink(133); ?>">Model S</a></li>
            <li><a href="<?php echo get_permalink(20); ?>">Model 3</a></li>
            <li><a href="<?php echo get_permalink(19); ?>">Model X</a></li>
            <li><a href="<?php echo get_permalink(21); ?>">Model Y</a></li>
            <li><a href="<?php echo get_permalink(135); ?>">Model S Plaid</a></li>
            <li><a href="<?php echo get_permalink(137); ?>">Cybertruck</a></li>
        </ul>
    </header>









