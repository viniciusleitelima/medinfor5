<?php
/**
 * 'logoshowcase' Design 1 Shortcodes HTML
 *
 * @package WP Logo Showcase Responsive Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="wpls-logo-cnt">
	<div class="wpls-fix-box">
		<?php if ($logourl != '') { ?>
			<a href="<?php echo esc_url($logourl); ?>" target="<?php echo esc_attr($link_target); ?>">
				<img class="wp-post-image" <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($feat_image); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($feat_image); } ?>" alt="<?php echo esc_attr($feat_image_alt); ?>" />
			</a>
		<?php } else { ?>
			<img class="wp-post-image" <?php if($lazyload) { ?>data-lazy="<?php echo esc_url($feat_image); ?>" <?php } ?> src="<?php if(empty($lazyload)) { echo esc_url($feat_image); } ?>" alt="<?php echo esc_attr($feat_image_alt); ?>" />
		<?php } ?>
	</div>
	<?php if($show_title == 'true') { ?>
		<div class="logo-title"><?php the_title(); ?></div>
	<?php } ?>
</div>