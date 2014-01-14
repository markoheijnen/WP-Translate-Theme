<?php
gp_title( sprintf( __( 'Edit Project %s &lt; GlotPress' ),  $project->name ) );
gp_breadcrumb_project( $project );
gp_tmpl_header();
?>

		<h2><?php echo wptexturize( sprintf( __('Edit project "%s"'), esc_html( $project->name ) ) ); ?></h2>

		<form action="" method="post" class="form-left form-horizontal" role="form">
			<?php gp_tmpl_load( 'project-form', get_defined_vars()); ?>

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<input type="submit" name="submit" value="<?php echo esc_attr( __('Save') ); ?>" id="submit" class="btn btn-primary" />
					<span class="or-cancel"><?php _e('or'); ?> <a href="javascript:history.back();"><?php _e('Cancel'); ?></a></span>
				</div>
			</div>

		</form>

<?php gp_tmpl_footer();