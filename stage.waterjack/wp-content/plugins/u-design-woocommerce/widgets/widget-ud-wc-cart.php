<?php 
/**
 * Widget Name: U-Design-WooCommerce Cart
 * Description: A widget that displayes account info such as Login | Register | Cart Info
 * Version: 0.1
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'udesign_woocommerce_account_load_widgets' );

/**
 * Register our widget.
 * 'UDesign_WooCommerce_Widget_Cart' is the widget class used below.
 *
 * @since 0.1
 */
function udesign_woocommerce_account_load_widgets() {
	register_widget( 'UDesign_WooCommerce_Widget_Cart' );
}

/**
 * U-Design-WooCommerce Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class UDesign_WooCommerce_Widget_Cart extends WP_Widget {

	/**
	 * Widget setup.
	 */
	public function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'udesign-wc-cart', 'description' => esc_html__('A widget that displays cart info.', 'udesign-woocommerce') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'udesign-wc-cart-widget' );

		/* Create the widget. */
		parent::__construct( 'udesign-wc-cart-widget', esc_html__('U-Design: WooCommerce Cart', 'udesign-woocommerce'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
                
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );

		/* Before widget (defined by themes). */
		echo $before_widget;
                
		/* Display the widget title ONLY if the widget is used in widget area other than "Top Area Social Media" */
		//if ( $title && ( $args['id'] !== 'top-area-social-media' ) ) {
		if ( $title ) {
                    echo $before_title . $title . $after_title;
                }
                
                /* Apply the following ONLY if the widget is used in "Top Area Social Media" widget area */
		if ( $args['id'] == 'top-area-social-media' ) : 
                    global $udesign_options; ?>
                    <style>
                        .social-media-area .udesign-wc-cart,
                        .social-media-area .udesign-wc-cart a,
                        .social-media-area .udesign-wc-cart h3.social_media_title { color:#<?php echo $udesign_options['top_text_color']; ?>; }
                    </style>
<?php           endif; ?>
                <div class="udesign-woocommerce-my-cart">
<?php               if ( is_user_logged_in() ) { ?>
                        <a class="ud-wc-cart-my-account" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','udesign-woocommerce'); ?>"><?php _e('My Account','udesign-woocommerce'); ?></a> <span class="ud-wc-cart-divider">|</span> 
                        <a class="ud-wc-cart-logout" href="<?php echo wp_logout_url( get_permalink() ) ?>" title="<?php _e('Logout','udesign-woocommerce'); ?>"><?php _e('Logout','udesign-woocommerce'); ?></a> <span class="ud-wc-cart-divider">|</span> 
<?php               } else { ?>
                        <a class="ud-wc-cart-login" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','udesign-woocommerce'); ?>"><?php _e('Login','udesign-woocommerce'); ?></a> <span class="ud-wc-cart-divider">|</span> 
<?php                   if ( get_option( 'woocommerce_enable_myaccount_registration' ) == 'yes' ) : ?>
                        <a class="ud-wc-cart-register" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Register','udesign-woocommerce'); ?>"><?php _e('Register','udesign-woocommerce'); ?></a> <span class="ud-wc-cart-divider">|</span> 
<?php                   endif; ?>
<?php               } ?>

                    <div class="udesign-wc-cart-dropdown-wrapper"><i class="fa fa-shopping-basket" style="font-size:1.1em;"><!-- icon --></i> <a class="udesign-wc-cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'udesign-woocommerce'); ?>"><?php echo sprintf( __('Cart: %s %s ', 'udesign-woocommerce'), WC()->cart->get_cart_total(), '<span class="ud-wc-cart-num-items">( '.WC()->cart->get_cart_contents_count().' )</span>' ) ?></a></div>
                </div>

<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'udesign-woocommerce'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

<?php
	}
        
        
}

