<?php $losturl = wp_lostpassword_url(); ?>
<h4><?php esc_html_e( 'LOGIN', 'woocommerce' ); ?></h4>
<div><p><?php esc_html_e( 'Welcome back!', 'woocommerce' ); ?></p></div>
<form class="woocommerce-form woocommerce-form-login login" method="post">

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="username"><?php esc_html_e( 'E-mail', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="Bijv. jan@domein.be"/><?php // @codingStandardsIgnoreLine ?>
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" placeholder="Password" />
	</p>
    <p class="woocommerce-LostPassword lost_password">
		<a href="#" onclick='window.location.href = "<?php echo esc_url( wp_lostpassword_url() ); ?>"; return false;'><?php esc_html_e( 'Wachtwoord vergeten?', 'woocommerce' ); ?></a>
	</p>
	<?php do_action( 'woocommerce_login_form' ); ?>
	
	<p class="form-row">
		<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
		</label>
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'LOGIN', 'woocommerce' ); ?>"><?php esc_html_e( 'LOGIN', 'woocommerce' ); ?></button>
	</p>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>