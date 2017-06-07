<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div class="width-960">
		<?php
			/**
			 * woocommerce_single_product_summary_title hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			
			 */
			do_action( 'woocommerce_single_product_summary_title' );
		?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->
</div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->
<div class="breaker"></div>
<?php
 
/* crossells */
 
$crosssell_ids = get_post_meta( get_the_ID(), '_crosssell_ids' ); 
$crosssell_ids=$crosssell_ids[0];

?>
<div class="needToChangeThisOne"> 

<?php
if(count($crosssell_ids)>0){
 
    ?><h1 class="tryIt">Try a Recipe with this Product</h1> '><?php
$args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'post__in' => $crosssell_ids );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?><a href='<?php the_permalink(); ?>'><?php
the_post_thumbnail( 'thumbnail' );
the_title();
?></a><?php
endwhile;
}
?>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
