<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			if (function_exists('get_field')) {
				$acf_one = get_field('description');
				$acf_two = get_field('slideshow');

				if ($acf_one) {
					echo '<p class="description">' . $acf_one . '</p>';
				}

			}

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
