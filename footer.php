<?php

?>

	<footer id="colophon" class="site-footer">
		<div class="contact-us">
			<h2><?php _e('Contact Us', 'floral-shop'); ?></h2>
				<?php
					if (function_exists('get_field')) {
						$acf_one = get_field('footer_email', 27);
						$acf_two = get_field('footer_address', 27);
						$acf_three = get_field('footer_phone', 27);

						if ($acf_one) {
							echo '<p class="footer_email"><a href="' . $acf_one . '">Email</a></p>';
						}

						if ($acf_two) {
							echo '<p class="footer_address">' . $acf_two . '</p>';
						}

						if ($acf_three) {
							echo '<p class="footer_phone">' . $acf_three . '</p>';
						}
					}
				?>
		</div>
		<div class="delivery-areas">
			<h2><?php _e('Delivery Areas', 'floral-shop'); ?></h2>
				<?php
					if (function_exists('get_field')) {
						$acf_four = get_field('footer_delivery', 27);

						if ($acf_four) {
							echo '<p class="footer_delivery"><a href="' . $acf_four . '">Lower Mainland of BC</a></p>';
						}
					}
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
