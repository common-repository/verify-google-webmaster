<div class="wrap">
<h2>Google Webmaster </h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('google_w_master_tools'); ?>

<p>Insert your Google Webmaster Tools verification meta-tag below:</p>

<textarea name="gwebmasters_code" id="gwebmasters_code" rows="3"  cols="65" >
<?php echo get_option('gwebmasters_code'); ?> </textarea>


<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>

</div>
