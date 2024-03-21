<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			if (function_exists('get_field')) {
				$acf_one = get_field('delivery_information');
				$acf_two = get_field('image_of_map');

				if ($acf_one) {
					echo '<p class="delivery_information">' . $acf_one . '</p>';
				}
			}

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
