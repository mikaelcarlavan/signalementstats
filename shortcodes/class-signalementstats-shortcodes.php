<?php

/**
 * The shortcodes-facing functionality of the plugin.
 *
 * @link              http://mika-carl.fr
 * @since             1.0.0
 * @package           signalementstats
 * @subpackage signalementstats/shortcodes
 */

/**
 * The shortcodes-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the shortcodes-facing stylesheet and JavaScript.
 *
 * @package    signalementstats
 * @subpackage signalementstats/shortcodes
 * @author     		Mikael Carlavan <contact@mika-carl.fr>
 */
class SignalementStats_Shortcodes {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the shortcodes-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function process_signalementstats_contributorstats_shortcode($atts = [], $content = null, $tag = '') {

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

        $atts = array_change_key_case( (array) $atts, CASE_LOWER );

        // override default attributes with user attributes
        $params = shortcode_atts(
            array(
                'num' => '10',
            ), $atts, $tag
        );

        $endpoint = 'contributorstats/'.intval($params['num']);
        $contributors = $this->get_response($endpoint);

		// start output
	    $o = '<table class="signalementstats-contributors-table">'."\r\n";
        $o.= '<thead class="signalementstats-contributors-head">'."\r\n";
        $o.= '<tr>'."\r\n";
        $o.= '<th class="signalementstats-contributors-firstname">Prénom</th>'."\r\n";
        $o.= '<th class="signalementstats-contributors-lastname">Nom</th>'."\r\n";
        $o.= '<th class="signalementstats-contributors-total">Contributions</th>'."\r\n";
        $o.= '</tr>'."\r\n";
        $o.= '</thead>'."\r\n";
        $o.= '<tbody class="signalementstats-contributors-body">'."\r\n";

        if (count($contributors)) {
            foreach ($contributors as $contributor) {
                $o.= '<tr>'."\r\n";
                $o.= '<td class="signalementstats-contributors-firstname">'.$contributor['firstname'].'</td>'."\r\n";
                $o.= '<td class="signalementstats-contributors-lastname">'.$contributor['lastname'].'</td>'."\r\n";
                $o.= '<td class="signalementstats-contributors-total">'.$contributor['total'].'</td>'."\r\n";
                $o.= '</tr>'."\r\n";
            }
        }

        $o.= '</tbody>'."\r\n";
        $o.= '</table>'."\r\n";

        // return output
	    return $o;
	}

    /**
     * Register the stylesheets for the shortcodes-facing side of the site.
     *
     * @since    1.0.0
     */
    public function process_signalementstats_totalstats_shortcode($atts = [], $content = null, $tag = '') {

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

        $endpoint = 'totalstats';
        $total = $this->get_response($endpoint);

        // start output
        $o = '<span class="signalementstats-total">'.$total.'</span>'."\r\n";

        // return output
        return $o;
    }


    /**
     * Register the stylesheets for the shortcodes-facing side of the site.
     *
     * @since    1.0.0
     */
    public function process_signalementstats_humanstats_shortcode($atts = [], $content = null, $tag = '') {

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

        $endpoint = 'humanstats';
        $total = $this->get_response($endpoint);

        // start output
        $o = '<span class="signalementstats-human">'.$total.'</span>'."\r\n";

        // return output
        return $o;
    }


    /**
     * Register the stylesheets for the shortcodes-facing side of the site.
     *
     * @since    1.0.0
     */
    public function process_signalementstats_animalstats_shortcode($atts = [], $content = null, $tag = '') {

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

        $endpoint = 'animalstats';
        $total = $this->get_response($endpoint);

        // start output
        $o = '<span class="signalementstats-animal">'.$total.'</span>'."\r\n";

        // return output
        return $o;
    }


    /**
     * Register the stylesheets for the shortcodes-facing side of the site.
     *
     * @since    1.0.0
     */
    public function process_signalementstats_formstats_shortcode($atts = [], $content = null, $tag = '') {

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


        $atts = array_change_key_case( (array) $atts, CASE_LOWER );

        // override default attributes with user attributes
        $params = shortcode_atts(
            array(
                'ref' => '',
            ), $atts, $tag
        );

        $endpoint = 'formstats';
        $data = array(
            'ref' => $params['ref']
        );

        $total = $this->get_response($endpoint, 'post', $data);

        // start output
        $o = '<span class="signalementstats-form">'.$total.'</span>'."\r\n";

        // return output
        return $o;
    }


    /**
     * Register the stylesheets for the shortcodes-facing side of the site.
     *
     * @since    1.0.0
     */
    public function process_signalementstats_userstats_shortcode($atts = [], $content = null, $tag = '') {

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

        $endpoint = 'userstats';
        $total = $this->get_response($endpoint);

        // start output
        $o = '<span class="signalementstats-user">'.$total.'</span>'."\r\n";

        // return output
        return $o;
    }

    /**
     * Call API rest
     *
     * @since    1.0.0
     */
    private function get_response($endpoint, $method = 'get', $data = array())
    {
        $options = get_option( 'signalementstats_options' );

        $url = $options['signalementstats_dolibarr_url'];
        $key = $options['signalementstats_dolibarr_key'];
        // remove trailing slash
        $url = rtrim($url, '/');
        $url = $url .'/api/index.php/signalementapi/'.$endpoint;

        $args = array(
            'headers'     => array(
                'DOLAPIKEY' => $key,
            ),
            'sslverify' => false,
            'body' => $data
        );

        // sleep(0.1);

        $response = $method == 'get' ? wp_remote_get( $url, $args ) : wp_remote_post( $url, $args );

        $http_code = wp_remote_retrieve_response_code( $response );
        $result = null;

        if ($http_code == 200) {
            $body = wp_remote_retrieve_body( $response );
            $result = json_decode( $body, true );
        }

        return $result;
    }
}
