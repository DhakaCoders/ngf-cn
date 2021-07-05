<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' );
$reg = array();
if (isset( $_POST["account_email"] ) && isset($_POST['user_id'])) { 
	$reg = registered_user_info_update($_POST);
}
?>
<div class="woocommerce-edit-account-crtl">
	<?php if( isset($reg) && array_key_exists('error', $reg)  ){ ?>
        <div class="register-field-error">
    		<div class="error-msg">
              <span>
                <i><svg class="error-msg-icon-svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff">
                <use xlink:href="#error-msg-icon-svg"></use> </svg></i>
                <?php esc_html_e( 'Oh snap! Het formulier lijkt niet correct!', 'woocommerce' ); ?></span>
            </div>
    	</div>
    <?php 
        }elseif( isset($reg) && array_key_exists('success', $reg) ){
		?>
            <div class="register-field-error">
        		<div class="success-msg">
                  <span>
                    <i><svg class="error-msg-icon-svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff">
                    <use xlink:href="#error-msg-icon-svg"></use> </svg></i>
                    <?php esc_html_e( 'Bijgewerkt', 'woocommerce' ); ?></span>
                </div>
        	</div>
		<?php
        }
    ?>
	<form class="woocommerce-EditAccountForm edit-account" action="" method="post" >
		<input type="hidden" name="user_id" value="<?php echo $user->ID; ?>">
		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
		<fieldset>
			<legend><?php esc_html_e( 'Contact Person', 'woocommerce' ); ?></legend>
		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first required-field">
			<label for="account_first_name"><?php esc_html_e( 'Name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" placeholder="First Name"  id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
			<?php if( isset($reg) && array_key_exists('fname', $reg) ){printf('<span class="error-valid error-fname">%s</span>', $reg['fname'] );}?>
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last required-field">
			<label for="account_last_name">&nbsp;</label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" placeholder="Last Name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			<?php if( isset($reg) && array_key_exists('lname', $reg) ){printf('<span class="error-valid error-lname">%s</span>', $reg['lname'] );}?>
		</p>
		<div class="clear"></div>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide required-field">
			<label for="account_email"><?php esc_html_e( 'E-mail', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" placeholder="Bijv. jan@domein.be" />
			<?php if( isset($reg) && array_key_exists('email', $reg) ){printf('<span class="error-valid error-email">%s</span>', $reg['email'] );}?>
		</p>
		<div class="clear"></div>
		<p class="form-row form-row-first billing_gsm_number required-field" id="billing_address_1_field">
			<label for="billing_gsm_number" class=""><?php esc_html_e( 'GSM nummer', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<span class="woocommerce-input-wrapper">
				<input type="text" class="input-text " name="billing_gsm_number" id="billing_gsm_number" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_gsm_number', true ) ); ?>" placeholder="Bijv. 0493 20 36 20" autocomplete="gsm-number">
			</span>
			<?php if( isset($reg) && array_key_exists('gsm_number', $reg) ){printf('<span class="error-valid error-gsm_number">%s</span>', $reg['gsm_number'] );}?>
		</p>
		<p class="form-row form-row-last billing_phone required-field" id="billing_phone_field">
			<label for="billing_phone" class=""><?php esc_html_e( 'Phone', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<span class="woocommerce-input-wrapper">
				<input type="tel" class="input-text " name="billing_phone" id="billing_phone" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_phone', true ) ); ?>" placeholder="Bijv. 09 224 61 11" autocomplete="tel">
			</span>
			<?php if( isset($reg) && array_key_exists('phone', $reg) ){printf('<span class="error-valid error-phone">%s</span>', $reg['phone'] );}?>
		</p>
		
		</fieldset>
		<fieldset>
			<legend><?php esc_html_e( 'Address', 'woocommerce' ); ?></legend>

			<p class="form-row form-row-first billing_address_1 required-field" id="billing_address_1_field">
				<label for="billing_address_1" class=""><?php esc_html_e( 'Street Name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_address_1" id="billing_address_1" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_address_1', true ) ); ?>" placeholder="Stationstraat" autocomplete="address-line1">
				</span>
				<?php if( isset($reg) && array_key_exists('address1', $reg) ){printf('<span class="error-valid error-address1">%s</span>', $reg['address1'] );}?>
			</p>
			<p class="form-row form-row-last billing_house required-field" id="billing_house_field">
				<label for="billing_house" class=""><?php esc_html_e( 'House Number', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_house" id="billing_house" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_house', true ) ); ?>" placeholder="113" autocomplete="house-number">
				</span>
				<?php if( isset($reg) && array_key_exists('houseno', $reg) ){printf('<span class="error-valid error-houseno">%s</span>', $reg['houseno'] );}?>
			</p>
			<div class="clear"></div>
			<p class="form-row form-row-first billing_postcode required-field" id="billing_postcode_field">
				<label for="billing_postcode" class=""><?php esc_html_e( 'Postal code', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_postcode" id="billing_postcode" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_postcode', true ) ); ?>" placeholder="9300" autocomplete="postal-code">
				</span>
				<?php if( isset($reg) && array_key_exists('postcode', $reg) ){printf('<span class="error-valid error-postcode">%s</span>', $reg['postcode'] );}?>
			</p>
			<p class="form-row form-row-last billing_city required-field" id="billing_city_field">
				<label for="billing_city" class=""><?php esc_html_e( 'Town', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_city" id="billing_city" value="<?php echo esc_attr( get_user_meta( $user->ID, 'billing_city', true ) ); ?>" placeholder="Aalst" autocomplete="address-level2">
				</span>
				<?php if( isset($reg) && array_key_exists('city', $reg) ){printf('<span class="error-valid error-city">%s</span>', $reg['city'] );}?>
			</p>
		</fieldset>
		<fieldset>
			<legend><?php esc_html_e( 'Login Details', 'woocommerce' ); ?></legend>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first required-field">
				<label for="user_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="password" class="input-text " name="password" id="user_password" autocomplete="off" placeholder="Password" />
                <?php 
					if( isset($reg) && array_key_exists('pass', $reg) ){
					    printf('<span class="error-valid error-rel_password">%s</span>', $reg['pass'] );
					}else{
					    echo '<span class="error-valid error-rel_password"></span>';
					}
				?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last required-field">
				<label for="confirm_password"><?php esc_html_e( 'Confirm Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="password" class="input-text " name="confirm_password" id="userconfirm_password" autocomplete="off" placeholder="Password"/>
				<?php echo '<span class="error-valid error-confirm_password"></span>';?>
			</p>
		</fieldset>
		<div class="clear"></div>

		<?php do_action( 'woocommerce_edit_account_form' ); ?>

		<p>
			<input type="hidden" name="update_custom_account_details_nonce" value="<?php echo wp_create_nonce('update-custom-account-details-nonce'); ?>"/>
			<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Opslaan', 'woocommerce' ); ?>"><?php esc_html_e( 'Save', 'woocommerce' ); ?></button>
		</p>

		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
	</form>
</div>
<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
