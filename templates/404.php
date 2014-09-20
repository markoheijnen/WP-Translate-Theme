<?php
gp_title( __('Not Found &lt; GlotPress') );
gp_tmpl_header();
?>

		<h2><?php _e('Page not found'); ?></h2>

		<p>The page you requested could not be found.</p>

		<a href="<?php echo gp_url( '/' ); ?>" class="btn btn-large btn-primary"><span class="glyphicon glyphicon-home"></span> Take Me Home</a>

<?php
gp_tmpl_footer();