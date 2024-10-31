<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://sac.digital
 * @since      1.0.0
 *
 * @package    Sac_Digital_Lite
 * @subpackage Sac_Digital_Lite/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sac_Digital_Lite
 * @subpackage Sac_Digital_Lite/public
 * @author     Carlos Mendoza <carlos@sac.digital>
 */
class Sac_Digital_Lite_Public {

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
		$this->sac_lite_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sac_Digital_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sac_Digital_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sac-digital-lite-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sac_Digital_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sac_Digital_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sac-digital-lite-public.js', array( 'jquery' ), $this->version, false );

	}

		public function sac_digital_lite_addPopupHTML(){

			echo '<div id="sac--digital--popup"></div>';

		}

    public function sac_digital_lite_addPopupJS(){

        if(!empty($this->sac_lite_options['codigo_sac'])){

            if(!is_admin()){

								$link = $this->sac_lite_options['js_sac'];

                $try_url = @fopen($link,'r');

                if( $try_url !== false ) {

                  wp_deregister_script( 'popupJS' );
                  wp_register_script('popupJS', $this->sac_lite_options['js_sac'], array(), null, true);
									wp_enqueue_script('popupJS');

              }
        	}
				}
		}

}
