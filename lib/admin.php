<?php

function wp_theme_processform() {
	global $wp_theme_name;
	global $wp_theme_options;

	$wp_theme_options['tracking']		= $_POST['tracking'];
	$wp_theme_options['post_ad']		= $_POST['post_ad'];
	$wp_theme_options['custom_search']	= $_POST['custom_search'];
	$wp_theme_options['banner_ad']		= $_POST['banner_ad'];
	$wp_theme_options['homepage_ad']	= $_POST['homepage_ad'];

	// Store in DB
	update_option('swiftam-options', $wp_theme_options);
	wp_redirect("themes.php?page=functions.php&saved=true");
	die;
}


function getbetter_theme_page() {
	if ( isset( $_REQUEST['saved'] ) ) echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';

	global $wp_theme_options;

	// Extract options into usable variables
	extract((array)$wp_theme_options);
?>
<h2>Theme Settings</h2>

<form method="post" action="" id="wp_theme_options">
	<?php wp_nonce_field('wp_theme_options_submit'); ?>
	<table class="form-table">
		<tbody>
			<input type="hidden" name="wp_theme_options_submit" value="1"/>

		<tr>
		<th scope="row">Tracking Code</th>
		<td>Enter Google Analytics code here.<br />
		<textarea name="tracking" id="tracking" class="textarea" rows="5" cols="80"><?php echo stripslashes($tracking); ?></textarea>
		</td>
		</tr>
		
		<tr>
		<th scope="row">Banner Ads</th>
		<td>Enter Banner Ads below - this is the ad block that appears
		across the top of the site.<br />
		<textarea name="banner_ad" id="banner_ad" class="textarea" rows="5" cols="80"><?php echo stripslashes($banner_ad); ?></textarea>
		</td>
		</tr>

		<tr>
		<th scope="row">Homepage Ads</th>
		<td>Enter Homepage Ads below - these appear on the first 3 posts
		shown on the home page.<br />
		<textarea name="homepage_ad" id="homepage_ad" class="textarea" rows="5" cols="80"><?php echo stripslashes($homepage_ad); ?></textarea></td>
		</tr>

		<tr>
		<th scope="row">Post Ads</th>
		<td>Enter Post Ads below - this is the ad block that appears on single posts.
		<textarea name="post_ad" id="post_ad" class="textarea" rows="5" cols="80"><?php echo stripslashes($post_ad); ?></textarea></td>
		</tr>

		<tr>
		<th scope="row">Custom Search</th>
		<td>Replace search box (from top-right of page)<br />
		<textarea name="custom_search" id="custom_search" class="textarea" rows="5" cols="80"><?php echo stripslashes($custom_search); ?></textarea></td>
		</tr>
		</tbody>
	</table>

	<p class="submit">
		<input name="save" type="submit" value="Save Options &raquo;" />
		<input type="hidden" name="action" value="save" />
	</p>
</form>
<?php
}

?>
