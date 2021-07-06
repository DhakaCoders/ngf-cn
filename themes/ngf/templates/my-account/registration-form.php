<?php 
	global $woocommerce; global $data_reg;
	$btminfo = get_field('myaccount', 'options'); 
	$setedtelephone = isset( $_POST["reg_telefoon"])? $_POST["reg_telefoon"]:'';
    $countries_obj   = new WC_Countries();
    //$countries   = $countries_obj->__get('countries');
    $countries = $countries_obj->get_allowed_countries();
?>
<div class="register-nextstep woocommerce-billing-fields" id="form_next">
	<div class="register-top-title">
		<?php if( !empty($btminfo['reg_titel']) ) printf('<h3>%s</h3>', $btminfo['reg_titel']); ?>
		<?php if( !empty($btminfo['reg_beschrijving']) ) echo wpautop($btminfo['reg_beschrijving']); ?>
	</div>
	<?php if($data_reg): ?>
	
	<?php endif; ?>
	<?php if( isset($data_reg) && array_key_exists('error', $data_reg)  ):  ?>
    <div class="register-field-error">
			<div class="error-msg">
        <span>
          <i><svg class="error-msg-icon-svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff">
          <use xlink:href="#error-msg-icon-svg"></use> </svg></i>
          <?php esc_html_e( 'Oh snap! The form is incorrect!', 'woocommerce' ); ?></span>
      </div>
		</div>
	<?php endif; ?>
	<div class="register-title">
		<h3><?php esc_html_e( 'Personal details', 'woocommerce' ); ?></h3>
	</div>
	<form id="regiter_action_form" action="" method="post">
		<input type="hidden" name="action" value="ajax_register_save">
		<div class="type-order-format">
			<p class="form-row form-row-wide" id="billing_order_type_field">
				<label for="billing_order_type"><?php esc_html_e( 'Type of order', 'woocommerce' ); ?></label>
				<span class="woocommerce-input-wrapper">
					<span><input type="radio" checked id="private" name="billing_order_type" value="Individual">&nbsp;<?php esc_html_e( 'Individual', 'woocommerce' ); ?></span>
					<span><input type="radio" id="for_business" name="billing_order_type" value="Business">&nbsp;<?php esc_html_e( 'Business', 'woocommerce' ); ?></span>
				</span>
			</p>
			<p class="form-row form-row-wide" id="billing_salutation_field">
				<label for="billing_salutation"><?php esc_html_e( 'Salutation', 'woocommerce' ); ?>*</label>
				<span class="woocommerce-input-wrapper">
					<span><input type="radio" name="billing_salutation" value="Mrs">&nbsp;<?php esc_html_e( 'Mrs.', 'woocommerce' ); ?></span>
					<span><input type="radio" checked name="billing_salutation" value="Mr">&nbsp;<?php esc_html_e( 'Mr.', 'woocommerce' ); ?></span>
				</span>
			</p>
		</div>
		<div class="woocommerce-billing-fields__field-wrapper">
			<p class="form-row form-row-first required-field" id="billing_first_name_field">
				<label for="billing_first_name" class=""><?php esc_html_e( 'Name', 'woocommerce' ); ?></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="First Name" value="<?php echo isset($_POST['billing_first_name'])? $_POST['billing_first_name']:'';?>">
				</span>
				<?php if( isset($data_reg) && array_key_exists('fname', $data_reg) ){printf('<span class="error-valid error-fname">%s</span>', $data_reg['fname'] );}?>
			</p>
			<p class="form-row form-row-last required-field" id="billing_last_name_field">
				<label for="billing_first_name" class="">&nbsp;</label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="Last Name" value="<?php echo isset($_POST['billing_last_name'])? $_POST['billing_last_name']:'';?>">
				</span>
				<?php if( isset($data_reg) && array_key_exists('lname', $data_reg) ){printf('<span class="error-valid error-lname">%s</span>', $data_reg['lname'] );}?>
			</p>
			<div id="extra_fields"></div>
			<?php 
				woocommerce_form_field('billing_country', array(
			    'type'       => 'select',
			    'class'      => array( 'country_to_state country_select' ),
			    'label'      => __('Country'),
			    'placeholder'    => __('Select Country'),
			    'options'    => $countries
			    )
			    );
			?>
			<p class="form-row form-row-first billing_postcode required-field" id="billing_postcode_field">
				<label for="billing_postcode" class=""><?php esc_html_e( 'Postal code', 'woocommerce' ); ?></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="Bijv. 9300" value="<?php echo isset($_POST['billing_postcode'])? $_POST['billing_postcode']:'';?>">
				</span>
				<?php if( isset($data_reg) && array_key_exists('postcode', $data_reg) ){printf('<span class="error-valid error-postcode">%s</span>', $data_reg['postcode'] );}?>
			</p>
			<p class="form-row form-row-last billing_city required-field" id="billing_city_field">
				<label for="billing_city" class=""><?php esc_html_e( 'Town', 'woocommerce' ); ?></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="Bijv. 9300" value="<?php echo isset($_POST['billing_city'])? $_POST['billing_city']:'';?>">
				</span>
				<?php if( isset($data_reg) && array_key_exists('city', $data_reg) ){printf('<span class="error-valid error-city">%s</span>', $data_reg['city'] );}?>
			</p>

			<p class="form-row form-row-first billing_address_1 required-field" id="billing_address_1_field">
				<label for="billing_address_1" class=""><?php esc_html_e( 'Street Name', 'woocommerce' ); ?></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Bijv. Stationstraat" value="<?php echo isset($_POST['billing_address_1'])? $_POST['billing_address_1']:'';?>">
				</span>
				<?php if( isset($data_reg) && array_key_exists('address1', $data_reg) ){printf('<span class="error-valid error-address1">%s</span>', $data_reg['address1'] );}?>
			</p>
			<p class="form-row form-row-last billing_house required-field" id="billing_house_field">
				<label for="billing_house" class=""><?php esc_html_e( 'House Number', 'woocommerce' ); ?></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_house" id="billing_house" placeholder="Bijv. 113-C" value="<?php echo isset($_POST['billing_house'])? $_POST['billing_house']:'';?>" autocomplete="house-number">
				</span>
				<?php if( isset($data_reg) && array_key_exists('houseno', $data_reg) ){printf('<span class="error-valid error-houseno">%s</span>', $data_reg['houseno'] );}?>
			</p>
			<p class="form-row form-row-wide billing_address_2" id="billing_address_2_field">
				<label for="billing_address_2" class=""><?php esc_html_e( 'Extra address', 'woocommerce' ); ?></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="" value="<?php echo isset($_POST['billing_address_2'])? $_POST['billing_address_2']:'';?>" autocomplete="address-line2">
				</span>
			</p>
			<div class="billing-address-wrap">
				<h3><?php esc_html_e( 'Billing Address', 'woocommerce' ); ?></h3>
				<p class="same-as-shipping-address">
					<input type="checkbox" name="is_shipping_address" id="is_shipping_address" value="0">&nbsp;<?php esc_html_e( 'Same as delivery address', 'woocommerce' ); ?>
				</p>
				<!-- Start Shipping fields -->
				<div class="show_shipping_fields">
					<p class="form-row form-row-first required-field" id="shipping_first_name_field">
						<label for="shipping_first_name" class=""><?php esc_html_e( 'Name', 'woocommerce' ); ?></label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder="First Name" value="<?php echo isset($_POST['shipping_first_name'])? $_POST['shipping_first_name']:'';?>">
						</span>
						<?php if( isset($data_reg) && array_key_exists('ship_fname', $data_reg) ){printf('<span class="error-valid error-ship_fname">%s</span>', $data_reg['ship_fname'] );}?>
					</p>
					<p class="form-row form-row-last required-field" id="shipping_last_name_field">
						<label for="shipping_last_name" class="">&nbsp;</label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder="Last Name" value="<?php echo isset($_POST['shipping_last_name'])? $_POST['shipping_last_name']:'';?>">
						</span>
						<?php if( isset($data_reg) && array_key_exists('ship_lname', $data_reg) ){printf('<span class="error-valid error-ship_lname">%s</span>', $data_reg['ship_lname'] );}?>
					</p>
					<p class="form-row form-row-first shipping_postcode required-field" id="shipping_postcode_field">
						<label for="shipping_postcode" class=""><?php esc_html_e( 'Postal code', 'woocommerce' ); ?></label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="Bijv. 9300" value="<?php echo isset($_POST['shipping_postcode'])? $_POST['shipping_postcode']:'';?>">
						</span>
						<?php if( isset($data_reg) && array_key_exists('ship_postcode', $data_reg) ){printf('<span class="error-valid error-ship_postcode">%s</span>', $data_reg['ship_postcode'] );}?>
					</p>
					<p class="form-row form-row-last shipping_city required-field" id="shipping_city_field">
						<label for="shipping_city" class=""><?php esc_html_e( 'Town', 'woocommerce' ); ?></label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="shipping_city" id="shipping_city" placeholder="Bijv. 9300" value="<?php echo isset($_POST['shipping_city'])? $_POST['shipping_city']:'';?>">
						</span>
						<?php if( isset($data_reg) && array_key_exists('ship_city', $data_reg) ){printf('<span class="error-valid error-ship_city">%s</span>', $data_reg['ship_city'] );}?>
					</p>

					<p class="form-row form-row-first shipping_address_1 required-field" id="shipping_address_1_field">
						<label for="shipping_address_1" class=""><?php esc_html_e( 'Street Name', 'woocommerce' ); ?></label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="Bijv. Stationstraat" value="<?php echo isset($_POST['shipping_address_1'])? $_POST['shipping_address_1']:'';?>">
						</span>
						<?php if( isset($data_reg) && array_key_exists('ship_address1', $data_reg) ){printf('<span class="error-valid error-ship_address1">%s</span>', $data_reg['ship_address1'] );}?>
					</p>
					<p class="form-row form-row-last shipping_house required-field" id="shipping_house_field">
						<label for="shipping_house" class=""><?php esc_html_e( 'House Number', 'woocommerce' ); ?></label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="shipping_house" id="shipping_house" placeholder="Bijv. 113-C" value="<?php echo isset($_POST['shipping_house'])? $_POST['shipping_house']:'';?>" autocomplete="house-number">
						</span>
						<?php if( isset($data_reg) && array_key_exists('ship_houseno', $data_reg) ){printf('<span class="error-valid error-ship_houseno">%s</span>', $data_reg['ship_houseno'] );}?>
					</p>
					<p class="form-row form-row-wide shipping_address_2" id="shipping_address_2_field">
						<label for="shipping_address_2" class=""><?php esc_html_e( 'Extra address', 'woocommerce' ); ?></label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="shipping_address_2" id="shipping_address_2" placeholder="" value="<?php echo isset($_POST['shipping_address_2'])? $_POST['shipping_address_2']:'';?>" autocomplete="address-line2">
						</span>
					</p>
				</div><!-- End Shipping fields -->
				<p class="form-row form-row-wide required-field" id="billing_email_2_field">
					<label for="billing_email_2" class=""><?php esc_html_e( 'E-mail', 'woocommerce' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="email" class="input-text " name="billing_email_2" id="billing_email_2" placeholder="Bijv. jan@domein.be" value="<?php echo isset($_POST['billing_email_2'])? $_POST['billing_email_2']:'';?>">
					</span>
					<?php if( isset($data_reg) && array_key_exists('email2', $data_reg) ){printf('<span class="error-valid error-email2">%s</span>', $data_reg['email2'] );}?>
				</p>
				<p class="form-row form-row-first billing_gsm_number required-field" id="billing_address_1_field">
					<label for="billing_gsm_number" class=""><?php esc_html_e( 'GSM number', 'woocommerce' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="billing_gsm_number" id="billing_gsm_number" placeholder="Bijv. 0493 20 36 20" value="<?php echo isset($_POST['billing_gsm_number'])? $_POST['billing_gsm_number']:'';?>" autocomplete="gsm-number">
					</span>
					<?php if( isset($data_reg) && array_key_exists('gsm_number', $data_reg) ){printf('<span class="error-valid error-gsm_number">%s</span>', $data_reg['gsm_number'] );}?>
				</p>
				<p class="form-row form-row-last billing_phone" id="billing_phone_field">
					<label for="billing_phone required-field" class=""><?php esc_html_e( 'Phone', 'woocommerce' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="Bijv. 09 224 61 11" value="<?php echo isset($_POST['billing_phone'])? $_POST['billing_phone']:$setedtelephone;?>" autocomplete="tel" placeholder="Bijv. 09 224 61 11">
					</span>
					<?php if( isset($data_reg) && array_key_exists('phone', $data_reg) ){printf('<span class="error-valid error-phone">%s</span>', $data_reg['phone'] );}?>
				</p>
			</div>
			<div class="clearfix"></div>
			<div class="login-info">
				<!-- <p><input type="checkbox" name="create_account" value="1" checked>&nbsp;Account aanmaken</p> -->
				<h3><?php esc_html_e( 'Login Details', 'woocommerce' ); ?></h3>
				<p><?php esc_html_e( 'The email address and password are required to access the data. We will also keep you informed of the status of orders via this e-mail address.', 'woocommerce' ); ?></p>
				<p class="form-row form-row-wide required-field" id="billing_email_field">
					<label for="billing_email" class=""><?php esc_html_e( 'E-mail', 'woocommerce' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="Bijv. jan@domein.be" value="<?php echo isset($_POST['billing_email'])? $_POST['billing_email']:'';?>" autocomplete="email username">
					</span>
					
					<?php if( isset($data_reg) && array_key_exists('exists_email', $data_reg) ){printf('<span class="error-valid error-exists_email">%s</span>', $data_reg['exists_email'] );}?>
				</p>
				<p class="form-row form-row-first password required-field" id="password_field">
					<label for="re_password" class=""><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="password" class="input-text " name="password" id="re_password" placeholder="Minimum 8 characters"  autocomplete="password">
					</span>
					<?php 
    					if( isset($data_reg) && array_key_exists('pass', $data_reg) ){
    					    printf('<span class="error-valid error-rel_password">%s</span>', $data_reg['pass'] );
    					}else{
    					    echo '<span class="error-valid error-rel_password"></span>';
    					}
					?>
				</p>
				<p class="form-row form-row-last confirm_password required-field" id="confirm_password_field">
					<label for="confirm_password" class=""><?php esc_html_e( 'Confirm Password', 'woocommerce' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="password" class="input-text " name="confirm_password" id="confirm_password" autocomplete="confirm-password">
					</span>
					<?php 
    					if( isset($data_reg) && array_key_exists('conf_pass', $data_reg) ){
    					    printf('<span class="error-valid error-confirm_password">%s</span>', $data_reg['conf_pass'] );
    					}else{
    					    echo '<span class="error-valid error-confirm_password"></span>';
    					}
					?>
				</p>
			</div>
			<div class="personal-info">
				<h3><?php esc_html_e( 'Newsletter', 'woocommerce' ); ?></h3>
				<div class="form-row form-row-wide" id="billing_personal_recom">
					<span class="woocommerce-input-wrapper">
						<input type="checkbox" id="personal_recom" name="billing_personal_recom" value="1">&nbsp;<?php esc_html_e( 'Personal recommendations', 'woocommerce' ); ?>
					</span>
					<p><?php esc_html_e( 'Information and recommendations about services and articles that match your previous orders. And sometimes we ask for your opinion about our products and services.', 'woocommerce' ); ?></p>
				</div>
				<div class="form-row form-row-wide" id="billing_acttion_insp">
					<span class="woocommerce-input-wrapper">
						<input type="checkbox" id="acttion_insp" name="billing_acttion_insp" value="1">&nbsp;<?php esc_html_e( 'Acties en inspiratie', 'woocommerce' ); ?>
					</span>
					<p><?php esc_html_e( 'Discounts and giveaways, mountains of inspiration, but also surprising recommendations based on what you view and buy. That way you never miss out!', 'woocommerce' ); ?></p>
				</div>
			</div>
			<div class="register-btn">
				<div class="reg-btn-crtl">
					<p>
						<button type="submit" name="user-register" id="register_action_btn" value="<?php esc_attr_e( 'CONTINUE', 'woocommerce' ); ?>"><?php esc_html_e( 'CONTINUE', 'woocommerce' ); ?></button>
						<input type="hidden" name="user_register_nonce" value="<?php echo wp_create_nonce('user-register-nonce'); ?>"/>
					</p>
					<p class="form-row html-text">
						<span><?php esc_html_e( 'Buy safe & secure', 'woocommerce' ); ?></span>
					</p>
				</div>
			</div>
		</div>
	</form>
	<div class="register-pay-logo-wrap">
		<h3 class="payment-title"><?php esc_html_e( 'Safe payment is possible with us', 'woocommerce' ); ?></h3>
		<div class="payment-logo-crtl">
			<ul class="reset-list">
              <li><img src="<?php echo THEME_URI; ?>/assets/images/payment-logo-01.svg"></li>
              <li><img src="<?php echo THEME_URI; ?>/assets/images/payment-logo-03.svg"></li>
              <li><img src="<?php echo THEME_URI; ?>/assets/images/payment-logo-04.svg"></li>
              <li><img src="<?php echo THEME_URI; ?>/assets/images/payment-logo-05.svg"></li>
            </ul>
		</div>
	</div>
</div>