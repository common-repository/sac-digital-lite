<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sac.digital
 * @since      1.0.0
 *
 * @package    Sac_Digital_Lite
 * @subpackage Sac_Digital_Lite/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sac_Digital_Lite
 * @subpackage Sac_Digital_Lite/admin
 * @author     Carlos Mendoza <carlos@sac.digital>
 */
class Sac_Digital_Lite_Admin {

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
		 * defined in Sac_Digital_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sac_Digital_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sac-digital-lite-admin.css', array(), $this->version, 'all' );

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
		 * defined in Sac_Digital_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sac_Digital_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sac-digital-lite-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function sac_digital_lite_add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	    add_options_page( 'SAC DIGITAL Lite', 'SAC DIGITAL Lite', 'manage_options', $this->plugin_name, array($this, 'sac_digital_lite_display_plugin_setup_page')
	    );
	}

	public function sac_digital_lite_add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	public function sac_digital_lite_display_plugin_setup_page() {
	    include_once( 'partials/sac-digital-lite-admin-display.php' );
	}

	public function sac_digital_lite_options_update() {

	    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate_sac_digital_lite_code'));

	 }

	public function validate_sac_digital_lite_code($input) {

		$body = wp_remote_retrieve_body( wp_remote_get( 'https://lite.sac.digital/api/validateCode/'.$input['codigo_sac'] ) );

		if($body > 0){

						// All checkboxes inputs
						$valid = array();

				    //Cleanup
				    $valid['codigo_sac'] = sanitize_text_field($input['codigo_sac']);

						$valid['flag_sac']  = $body;
						$valid['js_sac'] = 'https://lite.sac.digital/popup.js?v='.$input['codigo_sac'];

						add_settings_error(
			        'sucessoCodigo',
			        esc_attr( 'settings_updated' ),
			        __( 'Popup ativado com sucesso. Agora pode disfrutar do SAC DIGITAL Lite no seu site!', 'my-text-domain' ),
			        'updated'
			    );

				    return $valid;

		}else{

			add_settings_error(
        'errorCodigo',
        esc_attr( 'settings_updated' ),
        __( 'Código SAC Inválido. Por favor, confira o seu código e tente de novo.', 'my-text-domain' ),
        'error'
    );

		}

	 }

}
