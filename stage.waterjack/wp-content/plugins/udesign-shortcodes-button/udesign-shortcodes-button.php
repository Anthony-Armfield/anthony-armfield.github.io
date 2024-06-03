<?php
/*
Plugin Name: U-Design Shortcodes Button
Plugin URI: https://themeforest.net/item/udesign-responsive-wordpress-theme/253220?ref=AndonDesign
Description: This plugin works with the U-Design theme to provide an easy way to insert the theme's collection of shortcodes into the WordPress editor.
Author: AndonDesign
Author URI: https://themeforest.net/user/andondesign
Version: 2.0.1
License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! class_exists( 'UDesignShortcodesButton' ) ) {

	class UDesignShortcodesButton {

		/**
		 * Main Constructor
		 *
		 * @since  2.0.0
		 * @access public
		 */
		public function __construct() {

			// Plugin version Constant
			define( 'UDESIGN_SHORTCODES_BUTTON_VERSION', '2.0.1' );
			define( 'UDESIGN_SHORTCODES_BUTTON_PLUGIN_SLUG', plugin_basename( __FILE__ ) );

			// Define path
			$this->dir_path = plugin_dir_path( __FILE__ );

			// Register activation hook
			register_activation_hook( __FILE__, array( $this, 'on_activation' ) );

			// Register de-activation hook
			register_deactivation_hook( __FILE__, array( $this, 'on_deactivation' ) );

			// Admin only
			if ( is_admin() ) {
                                // Dynamic Content in TinyMCE
                                add_action( 'wp_ajax_udesign_save_cats_list', array( $this, 'udesign_list_ajax' ) );
                                add_action( 'admin_footer', array( $this, 'udesign_save_cats_list' ) );
                                
				// MCE button
				add_action( 'admin_head', array( $this, 'add_mce_button' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'mce_css' ) );
			}

			// Test domain
			add_action( 'plugins_loaded', array( $this, 'load_text_domain' ) );

			// Common functions
			require_once( $this->dir_path .'/inc/commons.php' );

		}

		/**
		 * Load Text Domain for translations
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function load_text_domain() {
                    
                        $textdomain = 'udesign-shortcodes-button'; // Make sure that the textdomain matches the file name for the *.mo and *.po files {textdomain}-{locale}.mo, exameple: "udesign-shortcodes-button-de_DE.po" )
			load_plugin_textdomain( $textdomain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
                        
                        function udesign_shortcodes_button_add_locale( $locales ) {
                            $locales ['U-Design-Shortcodes-Button'] = plugin_dir_path ( __FILE__ ) . 'languages/udesign-shortcodes-button-strings.php';
                            return $locales;
                        }
                        add_filter( 'mce_external_languages', 'udesign_shortcodes_button_add_locale' );
                        
		}

		/**
		 * Add filters for the TinyMCE buttton
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function add_mce_button() {

			// Check user permissions
			if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
				return;
			}

			// Check if WYSIWYG is enabled
			if ( 'true' == get_user_option( 'rich_editing' ) ) {
				add_filter( 'mce_external_plugins', array( $this, 'add_tinymce_plugin' ) );
				add_filter( 'mce_buttons', array( $this, 'register_mce_button' ) );
			}

		}

		/**
		 * Loads the TinyMCE button js file
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function add_tinymce_plugin( $plugin_array ) {
			$plugin_array['udesign_shortcodes_mce_button'] = plugins_url( '/tinymce/udesign-shortcodes-tinymce.js', __FILE__ );
			return $plugin_array;
		}

		/**
		 * Adds the TinyMCE button to the post editor buttons
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function register_mce_button( $buttons ) {
			array_push( $buttons, 'udesign_shortcodes_mce_button' );
			return $buttons;
		}

		/**
		 * Loads custom CSS for the TinyMCE editor button
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function mce_css() {
			wp_enqueue_style('udesign_shortcodes-tc', plugins_url( '/tinymce/udesign-shortcodes-tinymce-style.css', __FILE__ ) );
		}

		/**
		 * Run on plugin activation
		 *
		 * @since 2.0.0
		 */
		public function on_activation() {
                    
                        // remove the old "U-Design Shortcode Insert Button" plugin
                        $this->remove_the_old_plugin();
                        
		}

		/**
		 * Run on plugin de-activation
		 *
		 * @since 2.0.0
		 */
		public function on_deactivation() {

			// nothing to do yet...

		}
                
		/**
		 * Remove the old "U-Design Shortcode Insert Button" plugin
		 *
		 * @since 2.0.0
		 */
                public function remove_the_old_plugin() {

                    $access_type = get_filesystem_method();
                    
                    if ( $access_type === 'direct' ) {

                        $creds = request_filesystem_credentials( esc_url_raw( site_url() ) . '/wp-admin/', '', false, false, array() );

                        /* initialize the API */
                        if ( ! WP_Filesystem( $creds ) ) {
                            /* any problems and we exit */
                            return false;
                        }

                        global $wp_filesystem;
                        
                        // Get the base plugin folder.
                        $plugins_dir = $wp_filesystem->wp_plugins_dir();
                        if ( empty( $plugins_dir ) ) {
                                return new WP_Error( 'fs_no_plugins_dir', __( 'Unable to locate WordPress plugin directory.', 'udesign-shortcodes-button' ) );
                        }
                        
                        $plugins_dir = trailingslashit( $plugins_dir );
                        
                        $plugin_file = 'udesign-shortcode-insert-button/udesignShortcodeInsert.php';
                        
                        // Run Uninstall hook.
                        if ( is_uninstallable_plugin( $plugin_file ) ) {
                                uninstall_plugin( $plugin_file );
                        }
                        
                        $this_plugin_dir = trailingslashit( dirname( $plugins_dir . $plugin_file ) );
                        
                        // deactivate the plugin first
                        deactivate_plugins( $plugin_file, true );
                        
                        if ( $wp_filesystem->exists( $this_plugin_dir ) ) { // check if plugin file exists
                                // If plugin is in its own directory, recursively delete the directory.
                                if ( strpos( $plugin_file, '/' ) && $this_plugin_dir != $plugins_dir ) { //base check on if plugin includes directory separator AND that it's not the root plugin folder
                                        $deleted = $wp_filesystem->delete( $this_plugin_dir, true );
                                } else {
                                        $deleted = $wp_filesystem->delete( $plugins_dir . $plugin_file );
                                }
                        }
                        
                        if ( ! $deleted ) {
                                return false;
                        }
                        
                        // Remove deleted plugins from the plugin updates list.
                        if ( $current = get_site_transient('update_plugins') ) {
                                unset( $current->response[ $plugin_file ] );
                                set_site_transient( 'update_plugins', $current );
                        } 
                        
                        return true;
                        
                    }
                    
                }

                
                
		/**
		 * Function to fetch categories list in the form:
                 *   [
                 *      { text: 'Category1 Name', value: 'Category1 ID' },
                 *      { text: 'Category2 Name', value: 'Category2 ID' },
                 *      { text: 'Category3 Name', value: 'Category3 ID' }
                 *   ]
                 * 
		 * @since  2.0
		 * @return string
		 */
		public function udesign_generate_cats_list() {
                        
                        $output_categories = array();
                        $categories = get_terms( array(
                                                'taxonomy' => 'category',
                                                'order' => 'ASC', 
                                                'hide_empty' => 0 )
                                            );
                        foreach( $categories as $category ) {
                                $output_categories[] = array(
                                        'text'    =>  $category->name . ' - (' . __( 'ID:', 'udesign-shortcodes-button' ) . ' ' . $category->term_id . ')',
                                        'value'   =>  $category->term_id
                                );
                        }
			wp_send_json( $output_categories );
                        
		}
                
		/**
		 * Function to secure the ajax call
                 * 
		 * @since  2.0
		 * @return string
		 */
		public function udesign_list_ajax() {
			// check for nonce
			check_ajax_referer( 'udesign-shortcodes-button-nonce', 'security' );
                        $get_categories_list = $this->udesign_generate_cats_list();
			return $get_categories_list;
		}
 		
		/**
		 * Function to pass the categories list to tinyMCE with ajax script
                 * 
		 * @since  2.0
		 * @return string
		 */
		public function udesign_save_cats_list() {
			// create nonce
			global $pagenow;
			if( $pagenow != 'admin.php' ){
				$nonce = wp_create_nonce( 'udesign-shortcodes-button-nonce' );
				?>
                                <script type="text/javascript">
					jQuery( document ).ready( function( $ ) {
						var data = {
							'action'	: 'udesign_save_cats_list',		// wp ajax action
							'security'	: '<?php echo $nonce; ?>'		// nonce value created earlier
						};
                                                
						// fire ajax
					  	jQuery.post( ajaxurl, data, function( response ) {
					  		// if nonce fails then not authorized else settings are saved
					  		if( response === '-1' ){
						  		// do nothing
						  		console.log('error');
					  		} else {
					  			if ( typeof( tinyMCE ) != 'undefined' ) {
					  				if ( tinyMCE.activeEditor != null ) {
										tinyMCE.activeEditor.settings.udesignCategoriesList = response;
									}
								}
					  		}
					  	});
					});
				</script>
				<?php
			}
		}

                
		
	}

	// Start things up
	$udesign_shortcodes = new UDesignShortcodesButton();

}