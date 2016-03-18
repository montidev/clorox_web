<?php

// create custom plugin settings menu
add_action('admin_menu', 'clorox_socialfeed_create_menu');

function clorox_socialfeed_create_menu() {

	//create new top-level menu
	add_menu_page(
    'Clorox socialfeed Settings',
    'Clorox socialfeed Settings',
    'administrator',
    'clorox_socialfeed_settings',
    'clorox_socialfeed_settings_page'
  );

	//call register settings function
	add_action( 'admin_init', 'register_clorox_socialfeed_settings' );
}


function register_clorox_socialfeed_settings() {
	//register our settings
	register_setting( 'clorox-socialfeed-settings-group', 'socialfeed_active', 'handle_socialfeed_active' );
	register_setting( 'clorox-socialfeed-settings-group', 'fb_app_id' );
	register_setting( 'clorox-socialfeed-settings-group', 'fb_app_secret' );
	register_setting( 'clorox-socialfeed-settings-group', 'fb_page_name' );
	register_setting( 'clorox-socialfeed-settings-group', 'yt_app_name' );
	register_setting( 'clorox-socialfeed-settings-group', 'yt_api_key' );
	register_setting( 'clorox-socialfeed-settings-group', 'yt_channel_id' );
}

function clorox_socialfeed_settings_page() {
	?>
	<div class="wrap">

    <form method="post" action="options.php">
    	<?php settings_fields( 'clorox-socialfeed-settings-group' ); ?>
      <?php do_settings_sections( 'clorox-socialfeed-settings-group' ); ?>
      <h1> Configuración Clorox socialfeed </h1>

      <h3> General </h3>
      <hr>
      <table class="form-table">
      	<tr valign="top">

      		<th scope="row">Habilitar Social Feed
      		</th>
      		<td>
      			<select name="socialfeed_active">
      				<option value="true" <?php if( get_option('socialfeed_active')) echo 'selected'; ?> > Si </option>
      				<option value="false" <?php if( !get_option('socialfeed_active')) echo 'selected'; ?> > No <option>
      			</select>
      		</td>
      	</tr>
      </table>


      <h3> Facebook </h3>
      <hr>
      <table class="form-table">
      	<tr valign="top">

      		<th scope="row">App id
      		</th>
      		<td>      			
      			<input type="text" name="fb_app_id" value="<?php echo esc_attr( get_option('fb_app_id') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">

      		<th scope="row">App secret
      		</th>
      		<td>
      			<input type="text" name="fb_app_secret" value="<?php echo esc_attr( get_option('fb_app_secret') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">
      		<th scope="row">Page name
      		</th>
      		<td>
      			<input type="text" name="fb_page_name" value="<?php echo esc_attr( get_option('fb_page_name') ); ?>" />
      		</td>
      	</tr>
      </table>



      <h3> Youtube </h3>
      <hr>
      <table class="form-table">
      	<tr valign="top">
      		<th scope="row">App name
      		</th>
      		<td>
      			<input type="text" name="yt_app_name" value="<?php echo esc_attr( get_option('yt_app_name') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">
      		<th scope="row">Api key
      		</th>
      		<td>
      			<input type="text" name="yt_api_key" value="<?php echo esc_attr( get_option('yt_api_key') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">
      		<th scope="row">Channel Id
      		</th>
      		<td>
      			<input type="text" name="yt_channel_id" value="<?php echo esc_attr( get_option('yt_channel_id') ); ?>" />
      		</td>
      	</tr>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>
	<?php 
		}


		function handle_socialfeed_active(){
			if(!empty($_POST["socialfeed_active"]))
			{
				$value = $_POST["socialfeed_active"];
				if( $value == 'false') {
					return false;
				} else {
					return true;
				}
			      
			}
			  
			return $option;
		}

