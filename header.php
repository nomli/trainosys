<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Trainosys
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'trainosys' ); ?></a>

	<header id="masthead" class="site-header">
	  <div class="container">
	  	<div class="hamburger hamburger--spin-r" data-target="#site-navigation">
		    <div class="hamburger-box">
		      <div class="hamburger-inner"></div>
		    </div>
		  </div>
		<!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'trainosys' ); ?></button>-->
			<div class="site-branding">
		  <?php
				the_custom_logo();
			?>
		</div><!-- .site-branding -->
		<nav id="site-navigation" class="main-navigation">
			
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<script type="text/javascript">
		(function(d){
			var hamburgers = document.querySelectorAll(".hamburger");
		    if (hamburgers.length > 0) {
		      [].forEach.call(hamburgers, function(hamburger) {
		        hamburger.addEventListener("click", function() {
		          this.classList.toggle("is-active");
		          d.querySelector(this.dataset.target).classList.toggle("toggled");
		          d.body.classList.toggle("locked");
		        }, false);
		      });
		    }
		})(document);
	</script>
	<div id="content" class="site-content">
