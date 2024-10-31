<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://sac.digital
 * @since      1.0.0
 *
 * @package    Sac_Digital_Lite
 * @subpackage Sac_Digital_Lite/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><?php echo esc_html(get_admin_page_title()); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span>Indique aqui o seu codigo SAC Digital pra ativar o Popup</span>
						</h2>

						<div class="inside">

              <form method="post" name="cleanup_options" action="options.php" style="margin-top:20px;">

                <?php
                        //Grab all options
                        $options = get_option($this->plugin_name);

                        if(!empty($options)){
                            $codigo_sac = $options['codigo_sac'];
                        }

                    ?>

                <?php

                  settings_fields($this->plugin_name);
                  do_settings_sections($this->plugin_name);

                  ?>

                  <fieldset>
                      <legend class="screen-reader-text"><span><?php _e('Indique o seu codigo SAC', $this->plugin_name); ?></span></legend>
                      <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-codigo-sac" name="<?php echo $this->plugin_name; ?>[codigo_sac]" value="<?php if(!empty($codigo_sac)) echo $codigo_sac; ?>"/>
                  </fieldset>

                      <?php submit_button('Ativar Popup', 'primary','submit', TRUE); ?>

                  </form>

						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span>Tem dúvidas?</span></h2>

						<div class="inside">
							<p>Se tem alguma dúvida sobre cómo usar este plugin ou se nao consegue fazer a ativacao do mesmo, por favor entre em contato no e-mail:</p>
              <a href="mailto:atendimento@lite.sac.digital?Subject=Atendimento%20Plugin%20SAC%20Digital%20Lite" target="_blank">atendimento@lite.sac.digital</a>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div>
