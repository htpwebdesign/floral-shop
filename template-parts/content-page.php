<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Floral_Shop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php floral_shop_post_thumbnail(); ?>

	<div class="entry-content">
		<?php

		if (function_exists('get_field')) {
			$acf_one = get_field('banner_image');
			$acf_two = get_field('slogan');
			$acf_three = get_field('blurb');
			$acf_four = get_field('cta_text');
			$acf_five = get_field('cta_link');
			$acf_six = get_field('featured_products');
			$acf_seven = get_field('home_subscription');
			?>
			<div class="home_hero">
			<div class="home_banner">
			<?php
			if (function_exists('get_field')) {
				$acf_eight = get_field('delivery_information');
	
				if ($acf_eight) {
					echo '<p class="delivery_information">' . $acf_eight . '</p>';
				}
			}
	
			if (function_exists('get_field')) {
				$acf_nine = get_field('description');
	
				if ($acf_nine) {
					echo '<p class="description">' . $acf_nine . '</p>';
				}
	
			}

			the_content();

			if ($acf_one) {
				echo wp_get_attachment_image( $acf_one, 'full' );
			}

			if ($acf_two) {
				echo '<p class="slogan">' . $acf_two . '</p>';
			}

			if ($acf_three) {
				echo '<p class="blurb">' . $acf_three . '</p>';
			}
			?>
			</div>

			<div class="home_cta">
			<?php
			if ($acf_five) {
				echo '<a class="cta_link" href="' . $acf_five . '">';
			}
			if ($acf_four) {
				echo '<p class="cta_text">' . $acf_four . '</p>';
			}
		
			?></a></div></div>

			<?php
			if ($acf_six) {
				echo '<article class="featured_products">';
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

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'floral-shop' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'floral-shop' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
