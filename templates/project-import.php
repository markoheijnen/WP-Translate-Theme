<?php
gp_title(
	$kind == 'originals' ?
	sprintf( __('Import Originals &lt; %s &lt; GlotPress'), esc_html( $project->name ) ) :
	sprintf( __('Import Translations &lt; %s &lt; GlotPress'), esc_html( $project->name ) )
);

gp_breadcrumb_project( $project );
gp_tmpl_header();
?>

		<h2><?php echo $kind == 'originals' ? __('Import Originals') : __('Import Translations'); ?></h2>
		<form action="" method="post" enctype="multipart/form-data" class="form-left form-horizontal" role="form">
			<div class="form-group">
				<label for="import-file" class="col-sm-4 col-md-3 control-label"><?php _e('Import File:'); ?></label>
				<div class="col-sm-4">
					<input type="file" id="import-file" class="form-control" name="import-file" />
				</div>
			</div>

			<div class="form-group">
				<label for="format" class="col-sm-4 col-md-3 control-label"><?php _e('Format:'); ?></label>
				<div class="col-sm-4">
					<?php
						$format_options = array();
						foreach ( GP::$formats as $slug => $format ) {
							$format_options[$slug] = $format->name;
						}
						echo gp_select( 'format', $format_options, 'po', array( 'class' => 'form-control' ) );
					?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<button type="submit" class="btn btn-primary"><?php echo esc_attr( __('Import') ); ?></button>
				</div>
			</div>
		</form>

<?php gp_tmpl_footer();