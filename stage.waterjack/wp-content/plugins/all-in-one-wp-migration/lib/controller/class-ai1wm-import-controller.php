<?php
/**
 * Copyright (C) 2014-2017 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

class Ai1wm_Import_Controller {

	public static function index() {
		Ai1wm_Template::render( 'import/index' );
	}

	public static function import( $params = array() ) {
		global $wp_filter;

		// Set error handler
		@set_error_handler( 'Ai1wm_Handler::error' );

		// Set shutdown handler
		@register_shutdown_function( 'Ai1wm_Handler::shutdown' );

		// Set params
		if ( empty( $params ) ) {
			$params = stripslashes_deep( $_REQUEST );
		}

		// Set priority
		$priority = 10;
		if ( isset( $params['priority'] ) ) {
			$priority = (int) $params['priority'];
		}

		// Set secret key
		$secret_key = null;
		if ( isset( $params['secret_key'] ) ) {
			$secret_key = trim( $params['secret_key'] );
		}

		try {
			// Ensure that unauthorized people cannot access import action
			ai1wm_verify_secret_key( $secret_key );
		} catch ( Ai1wm_Not_Valid_Secret_Key_Exception $e ) {
			exit;
		}

		// Get hook
		if ( isset( $wp_filter['ai1wm_import'] ) && ( $filters = $wp_filter['ai1wm_import'] ) ) {
			// WordPress 4.7 introduces new class for working with filters/actions called WP_Hook
			// which adds another level of abstraction and we need to address it.
			if ( isset( $filters->callbacks ) ) {
				$filters = $filters->callbacks;
			}

			ksort( $filters );

			// Loop over filters
			while ( $hooks = current( $filters ) ) {
				if ( $priority === key( $filters ) ) {
					foreach ( $hooks as $hook ) {
						try {

							// Run function hook
							$params = call_user_func_array( $hook['function'], array( $params ) );

							// Log request
							Ai1wm_Log::import( $params );

						} catch ( Ai1wm_Import_Retry_Exception $e ) {
							status_header( $e->getCode() );
							echo json_encode( array( 'errors' => array( array( 'code' => $e->getCode(), 'message' => $e->getMessage() ) ) ) );
							exit;
						} catch ( Exception $e ) {
							Ai1wm_Status::error( $e->getMessage() );
							Ai1wm_Directory::delete( ai1wm_storage_path( $params ) );
							exit;
						}
					}

					// Set completed
					$completed = true;
					if ( isset( $params['completed'] ) ) {
						$completed = (bool) $params['completed'];
					}

					// Do request
					if ( $completed === false || ( $next = next( $filters ) ) && ( $params['priority'] = key( $filters ) ) ) {
						if ( isset( $params['ai1wm_manual_import'] ) || isset( $params['ai1wm_manual_restore'] ) ) {
							echo json_encode( $params );
							exit;
						}

						return Ai1wm_Http::get( admin_url( 'admin-ajax.php?action=ai1wm_import' ), $params );
					}
				}

				next( $filters );
			}
		}
	}

	public static function buttons() {
		return array(
			apply_filters( 'ai1wm_import_file', Ai1wm_Template::get_content( 'import/button-file' ) ),
			apply_filters( 'ai1wm_import_url', Ai1wm_Template::get_content( 'import/button-url' ) ),
			apply_filters( 'ai1wm_import_ftp', Ai1wm_Template::get_content( 'import/button-ftp' ) ),
			apply_filters( 'ai1wm_import_dropbox', Ai1wm_Template::get_content( 'import/button-dropbox' ) ),
			apply_filters( 'ai1wm_import_gdrive', Ai1wm_Template::get_content( 'import/button-gdrive' ) ),
			apply_filters( 'ai1wm_import_s3', Ai1wm_Template::get_content( 'import/button-s3' ) ),
			apply_filters( 'ai1wm_import_onedrive', Ai1wm_Template::get_content( 'import/button-onedrive' ) ),
			apply_filters( 'ai1wm_import_box', Ai1wm_Template::get_content( 'import/button-box' ) ),
		);
	}

	public static function max_chunk_size() {
		return min(
			ai1wm_parse_size( ini_get( 'post_max_size' ), AI1WM_MAX_CHUNK_SIZE ),
			ai1wm_parse_size( ini_get( 'upload_max_filesize' ), AI1WM_MAX_CHUNK_SIZE ),
			ai1wm_parse_size( AI1WM_MAX_CHUNK_SIZE )
		);
	}
}
