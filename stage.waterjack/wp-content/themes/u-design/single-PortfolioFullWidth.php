<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    get_header();

?>
    <div id="content-container" class="container_24">
	<div id="main-content" class="grid_24">
	    <div class="main-content-padding">
<?php           udesign_main_content_top( is_front_page() ); ?>
<?php           if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <div <?php post_class(); ?> id="post-<?php the_ID();?>">
<?php                       udesign_single_portfolio_entry_before(); ?>
                            <div class="entry">
<?php                           udesign_single_portfolio_entry_top(); ?>
                                
<?php                           the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'udesign')); ?>
                                
<?php                           udesign_single_portfolio_entry_bottom(); ?>
                            </div>
<?php                       udesign_single_portfolio_entry_after(); ?>
                        </div>

<?php                   if( $udesign_options['show_portfolio_comments'] == 'yes' ) {
                            comments_template();
                        }
		    
                    endwhile; else: ?>
		    <p><?php esc_html_e("Sorry, no posts matched your criteria.", 'udesign'); ?></p>
<?php           endif; ?>

<?php           udesign_main_content_bottom(); ?>
	    </div><!-- end main-content-padding -->
	</div><!-- end main-content -->
    </div><!-- end content-container -->



