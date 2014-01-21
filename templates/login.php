<?php
gp_title( sprintf( __('%s &lt; GlotPress'), __('Login') ) );

gp_breadcrumb( array(
	__('Login'),
) );

gp_tmpl_header();
?>

		<form action="<?php echo gp_url_ssl( gp_url_current() ); ?>" method="post" class="form-signin" role="form">
			<h2 class="form-signin-heading"><?php _e('Login'); ?></h2>

			<?php do_action( 'before_login_form' ); ?>

			<input name="user_login" type="text" class="form-control" placeholder="<?php _e('Username'); ?>" required="" autofocus="">
			<input name="user_pass" type="password" class="form-control" placeholder="<?php _e('Password'); ?>" required="">

			<input type="hidden" value="<?php echo esc_attr( gp_get( 'redirect_to' ) ); ?>" id="redirect_to" name="redirect_to" />

			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"><?php _e('Login'); ?></button>

			<?php do_action( 'after_login_form' ); ?>
		</form>

		<?php gp_js_focus_on('user_login'); ?>

<?php gp_tmpl_footer();
