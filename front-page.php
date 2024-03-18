<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
    
        $acf_one = get_field('banner_image');
        $acf_two = get_field('slogan');
        $acf_three = get_field('blurb');
        $acf_four = get_field('cta_text');
        $acf_five = get_field('cta_link');
        $acf_six = get_field('featured_products');
        $acf_seven = get_field('home_subscription');

        if ($acf_one) {
          echo '<img class="banner_image" src="' . $acf_one . '">';
        }

        if ($acf_two) {
          echo '<p class="slogan">' . $acf_two . '</p>';
        }

        if ($acf_three) {
          echo '<p class="blurb">' . $acf_three . '</p>';
        }
        ?><div class="home_cta">

        <?php
        if ($acf_five) {
          echo '<a class="cta_link" href="' . $acf_five . '">';
        }
        if ($acf_four) {
          echo '<p class="cta_text">' . $acf_four . '</p>';
        }
      
        ?></a></div>

        <?php
        if ($acf_six) {
          echo '<div class="featured products">' . $acf_six . '</div>';
        }
        
        if ($acf_seven) {
          echo '<div class="home_subscription">' . $acf_seven . '</div>';
        }

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
