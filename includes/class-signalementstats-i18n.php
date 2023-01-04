<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link              http://mika-carl.fr
 * @since             1.0.0
 * @package           signalementstats
 * @subpackage 		  signalementstats/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since             1.0.0
 * @package           signalementstats
 * @subpackage 		  signalementstats/includes
 * @author     		Mikael Carlavan <contact@mika-carl.fr>
 */
class SignalementStats_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'signalementstats',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
