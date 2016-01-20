<?php
/*require_once( trailingslashit(dirname(__FILE__)) . 'google-api-php-client/src/Google_Client.php');
require_once( trailingslashit(dirname(__FILE__)) . 'google-api-php-client/src/contrib/Google_AnalyticsService.php');

$client = new Google_Client();
$client->setApplicationName("Goolytics - Simple Google Analytics");

$service = new Google_AnalyticsService($client);

if (isset($_GET['logout'])) {
	unset($_SESSION['token']);
}

if (isset($_GET['code'])) {
	$client->authenticate();
	$_SESSION['token'] = $client->getAccessToken();
	$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$client->setAccessToken($_SESSION['token']);
}

if ($client->getAccessToken()) {
	$props = $service->management_webproperties->listManagementWebproperties("~all");
	print "<h1>Web Properties</h1><pre>" . print_r($props, true) . "</pre>";

	$accounts = $service->management_accounts->listManagementAccounts();
	print "<h1>Accounts</h1><pre>" . print_r($accounts, true) . "</pre>";

	$_SESSION['token'] = $client->getAccessToken();
} else {
	$authUrl = $client->createAuthUrl();
	print "<a class='login' href='$authUrl'>Connect Me!</a>";
}*/
?>

<div class="wrap">
	<h2>Goolytics - Simple Google Analytics</h2>
	
	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>
		<?php settings_fields(self::_NAMESPACE); ?>
		
		<div id="poststuff">
			<div class="postbox">
				<div class="inside">
					<h3><?php _e('Settings', self::_NAMESPACE); ?></h3>
					<table class="form-table">
						
					<tr valign="top">
						<th scope="row" style="width:180px;text-align:right;"><label for="goolytics_web_property_id"><strong><?php _e('Google Analytics ID', self::_NAMESPACE); ?>:</strong><br /><small><a href="https://www.google.com/analytics/web/" target="_blank"><?php _e('(My Analytics accounts)', self::_NAMESPACE); ?></a></small></label></th>
						<td><input type="text" style="width:100px;" id="goolytics_web_property_id" name="goolytics_web_property_id" value="<?php echo get_option('goolytics_web_property_id'); ?>" /> <small><?php _e('Example: UA-0000000-0', self::_NAMESPACE); ?></small></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width:180px;text-align:right;"><label for="goolytics_anonymize_ip"><strong><?php _e('Anonymize IP?', self::_NAMESPACE); ?>:</strong><br /><small><?php _e('(Recommended for german users)', self::_NAMESPACE); ?></small></label></th>
						<td>
							<select id="goolytics_anonymize_ip" name="goolytics_anonymize_ip" style="width:100px;">
								<option value="0" <?php selected(get_option('goolytics_anonymize_ip'), 0); ?>><?php _e('No', self::_NAMESPACE) ; ?></option>
								<option value="1" <?php selected(get_option('goolytics_anonymize_ip'), 1); ?>><?php _e('Yes', self::_NAMESPACE) ; ?></option>
							</select>
							<small><?php _e('Tells Google Analytics to anonymize the information sent by the tracker objects by removing the last octet of the IP address prior to its storage.', self::_NAMESPACE); ?></small>
							<?php
							if( get_locale() == 'de_DE' ) {
								echo "<p style='padding:3px 6px;background:#ffffe0;border:solid 1px #e6db55;'>" . __("According to your backend locale, you seem to be a german user. It is recommended to set 'Anonymize IP' to Yes in order to respect german data protection rules!", self::_NAMESPACE) . "</p>";
							}
							?>
						</td>
					</tr>
					
					</table>
				
					<p>
						<input type="submit" class="button button-primary" value="<?php _e('Save Changes') ?>" />
					</p>
				</div>
			</div>
			
			<div id="ridwpa_plugins_box" class="postbox">
				<div class="inside">
			      	<h3><?php _e('More of my WordPress plugins', self::_NAMESPACE); ?></h3>
					<table class="form-table">
			 		<tr>
			 			<td>
			 				<?php _e('You may also be interested in some of my other plugins:', self::_NAMESPACE); ?>
							<p id="authorplugins-wrap"><input id="authorplugins-start" value="<?php _e('Show other plugins by this author inline &raquo;', self::_NAMESPACE); ?>" class="button-secondary" type="button"></p>
							<div id="authorplugins-wrap">
								<div id='authorplugins'>
									<div class='authorplugins-holder full' id='authorplugins_secondary'>
										<div class='authorplugins-content'>
											<ul id="authorpluginsul">
												
											</ul>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
			 				<?php _e('More plugins at: <a class="button rbutton" href="http://www.schloebe.de/portfolio/" target="_blank">www.schloebe.de</a>', self::_NAMESPACE); ?>
			 			</td>
			 		</tr>
					</table>
				</div>
			</div>
		</div>
	</form>
</div>