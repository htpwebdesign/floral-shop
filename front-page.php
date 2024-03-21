<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
    
      if (function_exists('get_field')) {
        $acf_one = get_field('banner_image');
        $acf_two = get_field('slogan');
        $acf_three = get_field('blurb');
        $acf_four = get_field('cta_text');
        $acf_five = get_field('cta_link');
        $acf_six = get_field('featured_products');
        $acf_seven = get_field('home_subscription');

        if ($acf_one) {
          echo wp_get_attachment_image( $acf_one, 'full' );
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
          echo '<article class="featured products">';
          foreach ($acf_six as $product) {
              $product_permalink = get_permalink($product->ID);
              echo '<a href="' . esc_url($product_permalink) . '">';
              echo '<div class="product">';
              echo '<h2>' . get_the_title($product->ID) . '</h2>';
              echo '<div class="product-thumbnail">' . get_the_post_thumbnail($product->ID, 'thumbnail') . '</div>';
              echo '<div class="product-price">' . get_post_meta($product->ID, '_price', true) . '</div>';
              echo '</div>';
              echo '</a>';
          }
          echo '</article>';
        }
        
        if ($acf_seven) {
          echo '<article class="home_subscription">';
          foreach ($acf_seven as $product) {
              $product_permalink = get_permalink($product->ID);
              echo '<a href="' . esc_url($product_permalink) . '">';
              echo '<div class="product">';
              echo '<h2>' . get_the_title($product->ID) . '</h2>';
              echo '<div class="product-thumbnail">' . get_the_post_thumbnail($product->ID, 'thumbnail') . '</div>';
              echo '<div class="product-price">' . get_post_meta($product->ID, '_price', true) . '</div>';
              echo '</div>';
              echo '</a>';
          }
          echo '</article>';
        }
      }
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
