<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			$acf_one = get_field('description');
      $acf_two = get_field('slideshow');

			if ($acf_one) {
				echo '<p class="description">' . $acf_one . '</p>';
			}

			// if ($acf_two) {
			// 	echo '<img class="slideshow" src="' . $acf_two . '">';
			// }

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
