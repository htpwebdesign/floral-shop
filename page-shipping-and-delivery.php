<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			$acf_one = get_field('delivery_information');
      $acf_two = get_field('image_of_map');

			if ($acf_one) {
				echo '<p class="delivery_information">' . $acf_one . '</p>';
			}

			if ($acf_two) {
				echo '<img class="image_of_map" src="' . $acf_two . '">';
			}

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
