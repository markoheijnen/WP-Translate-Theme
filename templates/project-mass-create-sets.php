<?php
gp_title( sprintf( __( 'Mass-create Translation Sets &lt; %s &lt; GlotPress' ),  $project->name ) );
gp_breadcrumb_project( $project );

wp_enqueue_script( 'mass-create-sets-page' );
wp_localize_script( 'mass-create-sets-page', '$gp_mass_create_sets_options', array(
	'url' => gp_url_join( gp_url_current(), 'preview'),
	'loading' => __('Loading translation sets to create&hellip;'),
));

gp_tmpl_header();
?>

		<h2><?php _e('Mass-create Translation Sets'); ?></h2>
		<p><?php _e('Here you can mass-create translation sets in this project.
		The list of translation sets will be mirrored with the sets of a project you choose.
		Usually this is one of the parent projects.'); ?></p>

		<form action="<?php echo esc_url( gp_url_current() ); ?>" method="post" class="form-left form-horizontal" role="form">
			<div class="form-group">
				<label for="project_id" class="col-sm-4 col-md-3 control-label"><?php _e('Project to take translation sets from:');  ?></label>
				<div class="col-sm-4">
					<?php echo gp_projects_dropdown( 'project_id', null, array( 'class' => 'form-control' ) ); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<div id="preview"></div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<input type="submit" name="submit" value="<?php echo esc_attr( __('Create Translation Sets') ); ?>" id="submit" class="btn btn-primary" />
				</div>
			</div>
		</form>

<?php gp_tmpl_footer();