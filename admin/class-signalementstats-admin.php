<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link              http://mika-carl.fr
 * @since             1.0.0
 * @package           signalementstats
 * @subpackage 		  signalementstats/includes
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @since             1.0.0
 * @package           signalementstats
 * @subpackage 		  signalementstats/includes
 * @author     		Mikael Carlavan <contact@mika-carl.fr>
 */
class SignalementStats_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SignalementStats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SignalementStats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/signalementstats-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SignalementStats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SignalementStats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/signalementstats-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function settings_init() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SignalementStats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SignalementStats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// register a new setting for "signalementstats" page
		 register_setting( 'signalementstats', 'signalementstats_options' );
		 
		 // register a new section in the "signalementstats" page
		 add_settings_section('signalementstats_main_section', __( 'Configuration du plugin', 'signalementstats' ),
		 	array($this, 'main_section_html'),
		 	'signalementstats'
		 );
		 
		 add_settings_field(
			 'signalementstats_dolibarr_url', // as of WP 4.6 this value is used only internally
			 __( 'URL Dolibarr', 'signalementstats' ),
			 array($this, 'dolibarr_url_html'),
			 'signalementstats',
			 'signalementstats_main_section',
			 [
				 'label_for' => 'signalementstats_dolibarr_url',
				 'class' => 'signalementstats_row',
				 'signalementstats_custom_data' => 'custom',
			 ]
		 );

		 add_settings_field(
			 'signalementstats_dolibarr_key', // as of WP 4.6 this value is used only internally
			 __( 'Clé API REST Dolibarr', 'signalementstats' ),
			 array($this, 'dolibarr_key_html'),
			 'signalementstats',
			 'signalementstats_main_section',
			 [
				 'label_for' => 'signalementstats_dolibarr_key',
				 'class' => 'signalementstats_row',
				 'signalementstats_custom_data' => 'custom',
			 ]
		 );
	}

	/**
	 * Register the settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function dolibarr_url_html( $args ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SignalementStats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SignalementStats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 // get the value of the setting we've registered with register_setting()
		 $options = get_option( 'signalementstats_options' );
		 // output the field
		 ?>
		 <input size="48" type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" data-custom="<?php echo esc_attr( $args['signalementstats_custom_data'] ); ?>" name="signalementstats_options[<?php echo esc_attr( $args['label_for'] ); ?>]" value="<?php echo $options[ $args['label_for'] ]; ?>">
		 <?php
	}

	/**
	 * Register the settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function dolibarr_key_html( $args ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SignalementStats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SignalementStats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 // get the value of the setting we've registered with register_setting()
		 $options = get_option( 'signalementstats_options' );
		 // output the field
		 ?>
		 <input size="48" type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" data-custom="<?php echo esc_attr( $args['signalementstats_custom_data'] ); ?>" name="signalementstats_options[<?php echo esc_attr( $args['label_for'] ); ?>]" value="<?php echo $options[ $args['label_for'] ]; ?>">
		<p class="description">
		 <?php esc_html_e( 'La page de configuration du module REST API de Dolibarr décrit la procédure à réaliser pour obtenir une clé', 'signalementstats' ); ?>
		 </p>
		 <?php	
	}


	/**
	 * Register the settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function main_section_html( $args ) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SignalementStats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SignalementStats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

 		?>
 			<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Merci de renseigner ci-dessous l\'URL de Dolibarr ainsi qu\'une clé de l\'API REST.', 'signalementstats' ); ?></p>
 		<?php
	}

	/**
	 * Register the options for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function options_page() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SignalementStats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SignalementStats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 add_menu_page('Connexion à la tiquothèque', 'Connexion à la tiquothèque', 'manage_options', 'signalementstats', array($this, 'options_page_html'));
	}
 

	/**
	 * Register the options for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function options_page_html() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in SignalementStats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The SignalementStats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

			// check user capabilities
		 if ( ! current_user_can( 'manage_options' ) ) {
		 	return;
		 }
		 
		 // add error/update messages
		 
		 // check if the user have submitted the settings
		 // wordpress will add the "settings-updated" $_GET parameter to the url
		 if ( isset( $_GET['settings-updated'] ) ) {
		 	// add settings saved message with the class of "updated"
		 	add_settings_error( 'signalementstats_messages', 'signalementstats_message', __( 'Configuration sauvegardée', 'signalementstats' ), 'updated' );
		 }
		 
		 // show error/update messages
		 settings_errors( 'signalementstats_messages' );
		 ?>

		 <div class="wrap">
		 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		 <form action="options.php" method="post">

		 <?php
		 // output security fields for the registered setting "signalementstats"
		 settings_fields( 'signalementstats' );
		 // output setting sections and their fields
		 // (sections are registered for "signalementstats", each field is registered to a specific section)
		 do_settings_sections( 'signalementstats' );
		 // output save settings button
		 submit_button( 'Sauvegarder' );
		 ?>

		 </form>
		 </div>
		 <?php
	}
}
