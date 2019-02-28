<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Trainosys
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
					<div class="row">
						<div class="col-sm-4">
							 <?php the_custom_logo(); ?>
						</div>
						<div class="col-sm-8">
							<ul class="footer-menu">
								<?php 
									$menuLocations = get_nav_menu_locations();
									$menuID = $menuLocations['menu-footer'];
									$footerNav = wp_get_nav_menu_items($menuID);
									
									foreach ( $footerNav as $navItem ) {
											echo '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
									}
								?>
								</ul>
								<div class="socialNcopy">
										<a href="mailto:inquiry@trainosys.com"><i class="far fa-envelope"></i></a>
										<a href="https://www.facebook.com/Trainosys-Training-Solutions-349735535589572/" target="_blank"><i class="fab fa-facebook-f"></i></a>
										<a href="viber://add?number=6583182056" target="_blank"><i class="fab fa-viber"></i></a>
										<a href="https://wa.me/6583182056" target="_blank"><i class="fab fa-whatsapp"></i></a>
										<p>All Rights Reserved</p>
								</div>
						</div>
					</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
