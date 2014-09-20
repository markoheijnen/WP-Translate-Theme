<?php
gp_title( sprintf( __( 'Branch Project %s &lt; GlotPress' ),  $project->name ) );
gp_breadcrumb_project( $project );
gp_tmpl_header();
?>

		<h2><?php echo wptexturize( sprintf( __('Branch project "%s"'), esc_html( $project->name ) ) ); ?></h2>

		<p><?php _e('Here you can branch out this project: everything will be duplicated into a new project for you.'); ?></p>

		<form action="<?php echo esc_url( gp_url_current() ); ?>" method="post" class="form-left form-horizontal" role="form">
			<input type="hidden" value="<?php echo esc_html( $project->parent_project_id ); ?>" name="project[parent_project_id]" id="project[parent_project_id]" />

			<div class="form-group">
				<label for="project[name]" class="col-sm-4 col-md-3 control-label"><?php _e('New branch name'); ?></label>
				<div class="col-sm-4">
					<input type="text" id="project[name]" class="form-control" name="project[name]" value="" placeholder="<?php _e('Type tag project name here'); ?>" />
				</div>
			</div>

			<div class="form-group">
				<label for="project[slug]" class="col-sm-4 col-md-3 control-label"><?php _e('New Slug'); ?></label>
				<div class="col-sm-4">
					<input type="text" id="project[slug]" class="form-control" name="project[slug]" value="" />
					<small><?php _e('If you leave the slug empty, it will be derived from the name.'); ?></small>
				</div>
			</div>

			<div class="form-group">
				<label for="project[description]" class="col-sm-4 col-md-3 control-label"><?php _e('Description'); ?> <small><?php _e('can include HTML'); ?></small></label>
				<div class="col-sm-4">
					<textarea id="project[description]" class="form-control" name="project[description]" rows="4" cols="40"><?php echo esc_html( $project->description ); ?></textarea>
				</div>
			</div>

			<div class="form-group">
				<label for="project[source_url_template]" class="col-sm-4 col-md-3 control-label"><?php _e('Source file URL'); ?></label>
				<div class="col-sm-4">
					<input type="text" id="project[source_url_template]" class="form-control" name="project[source_url_template]" value="<?php echo esc_html( $project->source_url_template ); ?>" />
					<small><?php _e('Public URL to a source file in the project. You can use <code>%file%</code> and <code>%line%</code>. Ex. <code>http://trac.example.org/browser/%file%#L%line%</code>'); ?></small>
				</div>
			</div>

			<div id="preview"></div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<input type="submit" name="submit" value="<?php echo esc_attr( __('Branch project') ); ?>" id="submit" class="btn btn-primary" />
				</div>
			</div>

		</form>

<?php gp_tmpl_footer();
