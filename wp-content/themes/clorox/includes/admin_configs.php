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
	register_setting( 'clorox-settings-group', 'telephone_contact' );
	register_setting( 'clorox-settings-group', 'email_contact');
	register_setting( 'clorox-settings-group', 'site_country' );
	register_setting( 'clorox-settings-group', 'country_flag' );
	register_setting( 'clorox-settings-group', 'logo', 'handle_logo_upload');
	register_setting( 'clorox-settings-group', 'contact_title' );
	register_setting( 'clorox-settings-group', 'contact_text' );
}

function clorox_settings_page() {
?>
  <div class="wrap">

    <form method="post" action="options.php" enctype="multipart/form-data">
      <?php settings_fields( 'clorox-settings-group' ); ?>
      <?php do_settings_sections( 'clorox-settings-group' ); ?>
      <h1> Configuración Clorox </h1>
      <h1> Redes sociales </h1>
      <table class="form-table">
      	<tr valign="top">

      		<th scope="row">Logo
      		</th>
      		<td>
      			<?php $logo = get_option('logo'); ?> 
      			<?php if($logo){ ?>
      			<img src="<?php echo $logo; ?>" height="100" style=""/>
      			<?php } ?>
      			<input type="file" name="logo" style="float: left;"/>

      		</td>
      	</tr>
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
        <tr valign="top">
          <th scope="row">Telefono de contacto</th>
          <td>
            <input type="text" name="telephone_contact" value="<?php echo esc_attr( get_option('telephone_contact') ); ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Email de contacto</th>
          <td>
            <input type="text" name="email_contact" value="<?php echo esc_attr( get_option('email_contact') ); ?>" />
          </td>
        </tr>
      </table>



      <h2>Formulario de contacto </h2>
      <table class="form-table">
      	<tr valign="top">
          <th scope="row">Título de formulario</th>
          <td>
            <input type="text" name="contact_title" value="<?php echo esc_attr( get_option('contact_title') ); ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Texto de formulario</th>
          <td>
            <textarea name="contact_text" rows="5"><?php echo esc_attr( get_option('contact_text') ); ?> </textarea>
          </td>
        </tr>
     	</table>

      <h2>Información regional del Sitio </h2>
      <table class="form-table">
        <tr valign="top">                   
          <th scope="row">Bándera</th>
          <td>
          	<select class="country_option_fake">
          		<option> Seleccionar país </option>
							<option value="AF">Afghanistan</option>
							<option value="AX">Åland Islands</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AS">American Samoa</option>
							<option value="AD">Andorra</option>
							<option value="AO">Angola</option>
							<option value="AI">Anguilla</option>
							<option value="AQ">Antarctica</option>
							<option value="AG">Antigua and Barbuda</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>
							<option value="BB">Barbados</option>
							<option value="BY">Belarus</option>
							<option value="BE">Belgium</option>
							<option value="BZ">Belize</option>
							<option value="BJ">Benin</option>
							<option value="BM">Bermuda</option>
							<option value="BT">Bhutan</option>
							<option value="BO">Bolivia, Plurinational State of</option>
							<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
							<option value="BA">Bosnia and Herzegovina</option>
							<option value="BW">Botswana</option>
							<option value="BV">Bouvet Island</option>
							<option value="BR">Brazil</option>
							<option value="IO">British Indian Ocean Territory</option>
							<option value="BN">Brunei Darussalam</option>
							<option value="BG">Bulgaria</option>
							<option value="BF">Burkina Faso</option>
							<option value="BI">Burundi</option>
							<option value="KH">Cambodia</option>
							<option value="CM">Cameroon</option>
							<option value="CA">Canada</option>
							<option value="CV">Cape Verde</option>
							<option value="KY">Cayman Islands</option>
							<option value="CF">Central African Republic</option>
							<option value="TD">Chad</option>
							<option value="CL">Chile</option>
							<option value="CN">China</option>
							<option value="CX">Christmas Island</option>
							<option value="CC">Cocos (Keeling) Islands</option>
							<option value="CO">Colombia</option>
							<option value="KM">Comoros</option>
							<option value="CG">Congo</option>
							<option value="CD">Congo, the Democratic Republic of the</option>
							<option value="CK">Cook Islands</option>
							<option value="CR">Costa Rica</option>
							<option value="CI">Côte d'Ivoire</option>
							<option value="HR">Croatia</option>
							<option value="CU">Cuba</option>
							<option value="CW">Curaçao</option>
							<option value="CY">Cyprus</option>
							<option value="CZ">Czech Republic</option>
							<option value="DK">Denmark</option>
							<option value="DJ">Djibouti</option>
							<option value="DM">Dominica</option>
							<option value="DO">Dominican Republic</option>
							<option value="EC">Ecuador</option>
							<option value="EG">Egypt</option>
							<option value="SV">El Salvador</option>
							<option value="GQ">Equatorial Guinea</option>
							<option value="ER">Eritrea</option>
							<option value="EE">Estonia</option>
							<option value="ET">Ethiopia</option>
							<option value="FK">Falkland Islands (Malvinas)</option>
							<option value="FO">Faroe Islands</option>
							<option value="FJ">Fiji</option>
							<option value="FI">Finland</option>
							<option value="FR">France</option>
							<option value="GF">French Guiana</option>
							<option value="PF">French Polynesia</option>
							<option value="TF">French Southern Territories</option>
							<option value="GA">Gabon</option>
							<option value="GM">Gambia</option>
							<option value="GE">Georgia</option>
							<option value="DE">Germany</option>
							<option value="GH">Ghana</option>
							<option value="GI">Gibraltar</option>
							<option value="GR">Greece</option>
							<option value="GL">Greenland</option>
							<option value="GD">Grenada</option>
							<option value="GP">Guadeloupe</option>
							<option value="GU">Guam</option>
							<option value="GT">Guatemala</option>
							<option value="GG">Guernsey</option>
							<option value="GN">Guinea</option>
							<option value="GW">Guinea-Bissau</option>
							<option value="GY">Guyana</option>
							<option value="HT">Haiti</option>
							<option value="HM">Heard Island and McDonald Islands</option>
							<option value="VA">Holy See (Vatican City State)</option>
							<option value="HN">Honduras</option>
							<option value="HK">Hong Kong</option>
							<option value="HU">Hungary</option>
							<option value="IS">Iceland</option>
							<option value="IN">India</option>
							<option value="ID">Indonesia</option>
							<option value="IR">Iran, Islamic Republic of</option>
							<option value="IQ">Iraq</option>
							<option value="IE">Ireland</option>
							<option value="IM">Isle of Man</option>
							<option value="IL">Israel</option>
							<option value="IT">Italy</option>
							<option value="JM">Jamaica</option>
							<option value="JP">Japan</option>
							<option value="JE">Jersey</option>
							<option value="JO">Jordan</option>
							<option value="KZ">Kazakhstan</option>
							<option value="KE">Kenya</option>
							<option value="KI">Kiribati</option>
							<option value="KP">Korea, Democratic People's Republic of</option>
							<option value="KR">Korea, Republic of</option>
							<option value="KW">Kuwait</option>
							<option value="KG">Kyrgyzstan</option>
							<option value="LA">Lao People's Democratic Republic</option>
							<option value="LV">Latvia</option>
							<option value="LB">Lebanon</option>
							<option value="LS">Lesotho</option>
							<option value="LR">Liberia</option>
							<option value="LY">Libya</option>
							<option value="LI">Liechtenstein</option>
							<option value="LT">Lithuania</option>
							<option value="LU">Luxembourg</option>
							<option value="MO">Macao</option>
							<option value="MK">Macedonia, the former Yugoslav Republic of</option>
							<option value="MG">Madagascar</option>
							<option value="MW">Malawi</option>
							<option value="MY">Malaysia</option>
							<option value="MV">Maldives</option>
							<option value="ML">Mali</option>
							<option value="MT">Malta</option>
							<option value="MH">Marshall Islands</option>
							<option value="MQ">Martinique</option>
							<option value="MR">Mauritania</option>
							<option value="MU">Mauritius</option>
							<option value="YT">Mayotte</option>
							<option value="MX">Mexico</option>
							<option value="FM">Micronesia, Federated States of</option>
							<option value="MD">Moldova, Republic of</option>
							<option value="MC">Monaco</option>
							<option value="MN">Mongolia</option>
							<option value="ME">Montenegro</option>
							<option value="MS">Montserrat</option>
							<option value="MA">Morocco</option>
							<option value="MZ">Mozambique</option>
							<option value="MM">Myanmar</option>
							<option value="NA">Namibia</option>
							<option value="NR">Nauru</option>
							<option value="NP">Nepal</option>
							<option value="NL">Netherlands</option>
							<option value="NC">New Caledonia</option>
							<option value="NZ">New Zealand</option>
							<option value="NI">Nicaragua</option>
							<option value="NE">Niger</option>
							<option value="NG">Nigeria</option>
							<option value="NU">Niue</option>
							<option value="NF">Norfolk Island</option>
							<option value="MP">Northern Mariana Islands</option>
							<option value="NO">Norway</option>
							<option value="OM">Oman</option>
							<option value="PK">Pakistan</option>
							<option value="PW">Palau</option>
							<option value="PS">Palestinian Territory, Occupied</option>
							<option value="PA">Panama</option>
							<option value="PG">Papua New Guinea</option>
							<option value="PY">Paraguay</option>
							<option value="PE">Peru</option>
							<option value="PH">Philippines</option>
							<option value="PN">Pitcairn</option>
							<option value="PL">Poland</option>
							<option value="PT">Portugal</option>
							<option value="PR">Puerto Rico</option>
							<option value="QA">Qatar</option>
							<option value="RE">Réunion</option>
							<option value="RO">Romania</option>
							<option value="RU">Russian Federation</option>
							<option value="RW">Rwanda</option>
							<option value="BL">Saint Barthélemy</option>
							<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
							<option value="KN">Saint Kitts and Nevis</option>
							<option value="LC">Saint Lucia</option>
							<option value="MF">Saint Martin (French part)</option>
							<option value="PM">Saint Pierre and Miquelon</option>
							<option value="VC">Saint Vincent and the Grenadines</option>
							<option value="WS">Samoa</option>
							<option value="SM">San Marino</option>
							<option value="ST">Sao Tome and Principe</option>
							<option value="SA">Saudi Arabia</option>
							<option value="SN">Senegal</option>
							<option value="RS">Serbia</option>
							<option value="SC">Seychelles</option>
							<option value="SL">Sierra Leone</option>
							<option value="SG">Singapore</option>
							<option value="SX">Sint Maarten (Dutch part)</option>
							<option value="SK">Slovakia</option>
							<option value="SI">Slovenia</option>
							<option value="SB">Solomon Islands</option>
							<option value="SO">Somalia</option>
							<option value="ZA">South Africa</option>
							<option value="GS">South Georgia and the South Sandwich Islands</option>
							<option value="SS">South Sudan</option>
							<option value="ES">Spain</option>
							<option value="LK">Sri Lanka</option>
							<option value="SD">Sudan</option>
							<option value="SR">Suriname</option>
							<option value="SJ">Svalbard and Jan Mayen</option>
							<option value="SZ">Swaziland</option>
							<option value="SE">Sweden</option>
							<option value="CH">Switzerland</option>
							<option value="SY">Syrian Arab Republic</option>
							<option value="TW">Taiwan, Province of China</option>
							<option value="TJ">Tajikistan</option>
							<option value="TZ">Tanzania, United Republic of</option>
							<option value="TH">Thailand</option>
							<option value="TL">Timor-Leste</option>
							<option value="TG">Togo</option>
							<option value="TK">Tokelau</option>
							<option value="TO">Tonga</option>
							<option value="TT">Trinidad and Tobago</option>
							<option value="TN">Tunisia</option>
							<option value="TR">Turkey</option>
							<option value="TM">Turkmenistan</option>
							<option value="TC">Turks and Caicos Islands</option>
							<option value="TV">Tuvalu</option>
							<option value="UG">Uganda</option>
							<option value="UA">Ukraine</option>
							<option value="AE">United Arab Emirates</option>
							<option value="GB">United Kingdom</option>
							<option value="US">United States</option>
							<option value="UM">United States Minor Outlying Islands</option>
							<option value="UY">Uruguay</option>
							<option value="UZ">Uzbekistan</option>
							<option value="VU">Vanuatu</option>
							<option value="VE">Venezuela, Bolivarian Republic of</option>
							<option value="VN">Viet Nam</option>
							<option value="VG">Virgin Islands, British</option>
							<option value="VI">Virgin Islands, U.S.</option>
							<option value="WF">Wallis and Futuna</option>
							<option value="EH">Western Sahara</option>
							<option value="YE">Yemen</option>
							<option value="ZM">Zambia</option>
							<option value="ZW">Zimbabwe</option>
						</select>

						<script>
							window.onload =function(){
						

								var select_element = document.querySelector('.country_option_fake');
								var select_options = document.querySelectorAll('.country_option_fake option');
								var currentValue = document.querySelector('#country_flag').value;
								currentValue = currentValue.toUpperCase();	
								currentOption = {};
								//currentOption = select_options.filter(checkValue);
								[].forEach.call(select_options, function(div) {
								  // do whatever
								  if(div.value == currentValue){
								  	currentOption = div;							
								  }
								  
								});
								

								
								
								currentOption.selected = true;

								select_element.onchange = function() {
								    var elem = (typeof this.selectedIndex === "undefined" ? window.event.srcElement : this);
								    var value = elem.value || elem.options[elem.selectedIndex].value;
								    var text = elem.text || elem.options[elem.selectedIndex].text;
								    
								    var countryFlag = document.querySelector('#country_flag');
								    var country = document.querySelector('#site_country');
								    countryFlag.value =  value.toLowerCase();
								    country.value = text; 
								}

							};
						</script>

            <input type="hidden" id="country_flag" name="country_flag" value="<?php echo esc_attr( get_option('country_flag') ); ?>" />
            <input type="hidden" id="site_country"  name="site_country" value="<?php echo esc_attr( get_option('site_country') ); ?>"/>
          </td>
        </tr>
      </table>

      <?php submit_button(); ?>

    </form>
  </div>
<?php }


function handle_logo_upload()
{

	if(!empty($_FILES["logo"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	  
	return $option;
}
