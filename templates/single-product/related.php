<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
	exit;
};

<?php
 
/* crossells */
 
$crosssell_ids = get_post_meta( get_the_ID(), '_crosssell_ids' ); 
$crosssell_ids=$crosssell_ids[0];
 
?>

<?php
	if(count($crosssell_ids)>0){
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