<?php
$options = get_option( 'fullstripe_options_f' );
?>
<div class="wrap">
	<h2><?php echo __( 'Full Stripe Settings', 'wp-full-stripe-free' ); ?></h2>
	<div id="updateDiv"><p><strong id="updateMessage"></strong></p></div>
	<p class="alert alert-info">The Stripe API keys are required for payments to work. You can find your keys on your
		<a href="https://manage.stripe.com">Stripe Dashboard</a> -> Account Settings -> API Keys tab</p>
	<form class="form-horizontal" action="" method="post" id="settings-form">
		<p class="tips"></p>
		<input type="hidden" name="action" value="wp_full_stripe_update_settings"/>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label class="control-label" for="secretKey_test"><?php _e( "Stripe Test Secret Key: ", 'wp-full-stripe-free' ); ?> </label>
				</th>
				<td>
					<input type="text" name="secretKey_test" id="secretKey_test" value="<?php echo $options['secretKey_test']; ?>" class="regular-text code">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label class="control-label" for="publishKey_test"><?php _e( "Stripe Test Publishable Key: ", 'wp-full-stripe-free' ); ?></label>
				</th>
				<td>
					<input type="text" id="publishKey_test" name="publishKey_test" value="<?php echo $options['publishKey_test']; ?>" class="regular-text code">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label class="control-label" for="secretKey_live"><?php _e( "Stripe Live Secret Key: ", 'wp-full-stripe-free' ); ?> </label>
				</th>
				<td>
					<input type="text" name="secretKey_live" id="secretKey_live" value="<?php echo $options['secretKey_live']; ?>" class="regular-text code">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label class="control-label" for="publishKey_live"><?php _e( "Stripe Live Publishable Key: ", 'wp-full-stripe-free' ); ?></label>
				</th>
				<td>
					<input type="text" id="publishKey_live" name="publishKey_live" value="<?php echo $options['publishKey_live']; ?>" class="regular-text code">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label class="control-label"><?php _e( "API mode: ", 'wp-full-stripe-free' ); ?> </label>
				</th>
				<td>
					<label class="radio">
						<input type="radio" name="apiMode" id="modeTest" value="test" <?php echo ( $options['apiMode'] == 'test' ) ? 'checked' : '' ?> >
						Test
					</label> <label class="radio">
						<input type="radio" name="apiMode" id="modeLive" value="live" <?php echo ( $options['apiMode'] == 'live' ) ? 'checked' : '' ?>>
						Live
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label class="control-label" for="currency"><?php _e( "Payment Currency: ", 'wp-full-stripe-free' ); ?></label>
				</th>
				<td>
					<div class="ui-widget">
						<select id="currency" name="currency">
							<option value=""><?php echo esc_attr( __( 'Select from the list or start typing', 'wp-full-stripe-free' ) ); ?></option>
							<?php
							foreach ( MM_WPFSF::get_available_currencies() as $currency_key => $currency_obj ) {
								$option = '<option value="' . $currency_key . '"';
								if ( $options['currency'] === $currency_key ) {
									$option .= 'selected="selected"';
								}
								$option .= '>';
								$option .= $currency_obj['name'] . ' (' . $currency_obj['code'] . ')';
								$option .= '</option>';
								echo $option;
							}
							?>
						</select>
					</div>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label class="control-label"><?php _e( "Include Default Styles: ", 'wp-full-stripe-free' ); ?> </label>
				</th>
				<td>
					<label class="radio">
						<input type="radio" name="includeStyles" id="includeStylesY" value="1" <?php echo ( $options['includeStyles'] == '1' ) ? 'checked' : '' ?> >
						Include
					</label> <label class="radio">
						<input type="radio" name="includeStyles" id="includeStylesN" value="0" <?php echo ( $options['includeStyles'] == '0' ) ? 'checked' : '' ?>>
						Exclude
					</label>
					<p class="description">Exclude styles if the payment forms do not appear properly. This can indicate
						a conflict with your theme.</p>
				</td>
			</tr>
		</table>
		<p class="submit">
			<button type="submit" class="button button-primary"><?php esc_attr_e( 'Save Changes', 'wp-full-stripe-free' ) ?></button>
		</p>
	</form>
</div>
