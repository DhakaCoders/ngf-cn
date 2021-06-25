<?php 
    $btminfo = get_field('myaccount', 'options'); 
    if( !empty($btminfo['subtitel']) ) printf('<h4>%s</h4>', $btminfo['subtitel']); 
?>
<div class="signup-notification">
	<?php if( !empty($btminfo['beschrijving']) ) echo wpautop($btminfo['beschrijving']); ?>
</div>
<form method="post" action="?action=registration" class="woocommerce-form woocommerce-form-register register" id="mail_checker">
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="reg_email"><?php esc_html_e( 'telefoonnummer', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_telefoon" id="reg_telefoonnummer" autocomplete="telefoonnummer" placeholder="Bijv. 0493 20 36 20" required/>
	</p>
	<p class="woocommerce-form-row form-row">
		<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" id="register_next" name="register" value="<?php esc_attr_e( 'DOORGAN', 'woocommerce' ); ?>"><?php esc_html_e( 'DOORGAN', 'woocommerce' ); ?></button>
	</p>
</form>