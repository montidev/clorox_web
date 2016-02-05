<?php
// create custom plugin settings menu
add_action('admin_menu', 'clorox_create_menu');

function clorox_create_menu() {

	//create new top-level menu
	add_menu_page(
    'Clorox Settings',
    'Clorox Settings',
    'administrator',
    'clorox-settings',
    'clorox_settings_page'
  );

	//call register settings function
	add_action( 'admin_init', 'register_clorox_settings' );
}


function register_clorox_settings() {
	//register our settings
	register_setting( 'clorox-settings-group', 'fb_link' );
	register_setting( 'clorox-settings-group', 'yt_link' );
}

function clorox_settings_page() {
?>
  <div class="wrap">
    <h2>Clorox</h2>

    <form method="post" action="options.php">
      <?php settings_fields( 'clorox-settings-group' ); ?>
      <?php do_settings_sections( 'clorox-settings-group' ); ?>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Facebook URL</th>
          <td>
            <input type="text" name="fb_link" value="<?php echo esc_attr( get_option('fb_link') ); ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Youtube URL</th>
          <td>
            <input type="text" name="yt_link" value="<?php echo esc_attr( get_option('yt_link') ); ?>" />
          </td>
        </tr>
      </table>

      <?php submit_button(); ?>

    </form>
  </div>
<?php }
