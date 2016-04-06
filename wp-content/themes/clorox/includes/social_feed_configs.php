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
	register_setting( 'clorox-socialfeed-settings-group', 'feed_1_link' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_1_text' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_1_image', 'handle_img_1_upload' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_1_type' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_2_link' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_2_text' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_2_image', 'handle_img_2_upload'  );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_2_type' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_3_link' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_3_text' );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_3_image', 'handle_img_3_upload'  );
	register_setting( 'clorox-socialfeed-settings-group', 'feed_3_type' );
}

function clorox_socialfeed_settings_page() {
	?>
	<div class="wrap">

    <form method="post" action="options.php" enctype="multipart/form-data">
    	<?php settings_fields( 'clorox-socialfeed-settings-group' ); ?>
      <?php do_settings_sections( 'clorox-socialfeed-settings-group' ); ?>
      <h1> Configuración Clorox socialfeed </h1>
      <hr>
      <h3> General </h3>
      
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

      <hr>
      <h3> 1er feed </h3>
      
      <table class="form-table">
      	<tr valign="top">

      		<th scope="row">Link
      		</th>
      		<td>      			
      			<input type="text" name="feed_1_link" value="<?php echo esc_attr( get_option('feed_1_link') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">

      		<th scope="row">Texto
      		</th>
      		<td>      			
      			<input type="text" name="feed_1_text" value="<?php echo esc_attr( get_option('feed_1_text') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">

      		<th scope="row">Imagen
      		</th>
      		<td>
      			<input type="file" name="feed_1_image" />
      			<img src="<?php echo esc_attr( get_option('feed_1_image')); ?>" height='100' />
      		</td>
      	</tr>
      	<tr valign="top">
      		<th scope="row">Type
      		</th>
      		<td>
      			<select name="feed_1_type" class="feed_type_select">
      				<option value=""> - </option>
      				<option value='facebook' <?php if( get_option('feed_1_type') == 'facebook') echo 'selected'; ?>>facebook</option>
      				<option value='youtube' <?php if( get_option('feed_1_type') == 'youtube' ) echo 'selected'; ?>>youtube</option>
      			</select>
      		</td>
      	</tr>
      </table>
      <hr>
      <h3> 2do feed </h3>
      
      <table class="form-table">
      	<tr valign="top">

      		<th scope="row">Link
      		</th>
      		<td>      			
      			<input type="text" name="feed_2_link" value="<?php echo esc_attr( get_option('feed_2_link') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">

      		<th scope="row">Texto
      		</th>
      		<td>      			
      			<input type="text" name="feed_2_text" value="<?php echo esc_attr( get_option('feed_2_text') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">

      		<th scope="row">Imagen
      		</th>
      		<td>
      			<input type="file" name="feed_2_image" />
      			<img src="<?php echo esc_attr( get_option('feed_2_image')); ?>" height='100' />
      		</td>
      	</tr>
      	<tr valign="top">
      		<th scope="row">Type
      		</th>
      		<td>
      			<select name="feed_2_type" class="feed_type_select">
      				<option value=""> - </option>
      				<option value='facebook' <?php if( get_option('feed_2_type') == 'facebook') echo 'selected'; ?>>facebook</option>
      				<option value='youtube' <?php if( get_option('feed_2_type') == 'youtube' ) echo 'selected'; ?>>youtube</option>
      			</select>
      		</td>
      	</tr>
      </table>
      <hr>
      <h3> 3er feed </h3>
      
      <table class="form-table">
      	<tr valign="top">

      		<th scope="row">Link
      		</th>
      		<td>      			
      			<input type="text" name="feed_3_link" value="<?php echo esc_attr( get_option('feed_3_link') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">

      		<th scope="row">Texto
      		</th>
      		<td>      			
      			<input type="text" name="feed_3_text" value="<?php echo esc_attr( get_option('feed_3_text') ); ?>" />
      		</td>
      	</tr>
      	<tr valign="top">

      		<th scope="row">Imagen
      		</th>
      		<td>
      			<input type="file" name="feed_3_image" />
      			<img src="<?php echo esc_attr( get_option('feed_3_image')); ?>" height='100' />
      		</td>
      	</tr>
      	<tr valign="top">
      		<th scope="row">Type
      		</th>
      		<td>
      			<select name="feed_3_type" class="feed_type_select">
      				<option value=""> - </option>
      				<option value='facebook' <?php if( get_option('feed_3_type') == 'facebook') echo 'selected'; ?>>facebook</option>
      				<option value='youtube' <?php if( get_option('feed_3_type') == 'youtube' ) echo 'selected'; ?>>youtube</option>
      			</select>
      		</td>
      	</tr>
      </table>
      


      <?php submit_button(); ?>
    </form>
  </div>
	<?php 
		}
		function handle_img_1_upload($option)
		{

			$option = get_option('feed_1_image');
			if(!empty($_FILES["feed_1_image"]["tmp_name"]))
			{
				$urls = wp_handle_upload($_FILES["feed_1_image"], array('test_form' => FALSE));
			    $temp = $urls["url"];				
			    return $temp;   
			}			  
			return $option;
		}

		function handle_img_2_upload()
		{
			$option = get_option('feed_2_image');
			if(!empty($_FILES["feed_2_image"]["tmp_name"]))
			{
				$urls = wp_handle_upload($_FILES["feed_2_image"], array('test_form' => FALSE));
			    $temp = $urls["url"];
			    return $temp;   
			}			  
			return $option;
		}

		function handle_img_3_upload()
		{
			$option = get_option('feed_3_image');
			if(!empty($_FILES["feed_3_image"]["tmp_name"]))
			{
				$urls = wp_handle_upload($_FILES["feed_3_image"], array('test_form' => FALSE));
			    $temp = $urls["url"];
			    return $temp;   
			}
			  
			return $option;
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

