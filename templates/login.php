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

			<button class="btn btn-lg btn-primary btn-block" name="submit"><?php _e('Login'); ?></button>

			<?php do_action( 'after_login_form' ); ?>
		</form>

		<script type="text/javascript" charset="utf-8">
			document.getElementById('user_login').focus();
		</script>

<?php gp_tmpl_footer();
