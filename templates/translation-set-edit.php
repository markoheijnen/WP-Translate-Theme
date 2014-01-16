<?php
gp_title( sprintf( __( 'Edit Translation Set &lt; %s &lt; %s &lt; GlotPress' ), $set->name, $project->name ) );
gp_breadcrumb( array(
	gp_link_project_get( $project, $project->name ),
	gp_link_get( $url, $locale->english_name . 'default' != $set->slug? ' '.$set->name : '' ),
) );
gp_tmpl_header();
?>

		<h2><?php _e( 'Edit Translation Set' ); ?></h2>

		<form action="" method="post" class="form-left form-horizontal" role="form">
			<?php gp_tmpl_load( 'translation-set-form', get_defined_vars() ); ?>

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<input type="submit" name="submit" value="<?php echo esc_attr( __('Save') ); ?>" id="submit" class="btn btn-primary" />
					<span class="or-cancel"><?php _e('or'); ?> <a href="javascript:history.back();"><?php _e('Cancel'); ?></a></span>
				</div>
			</div>
		</form>

<?php gp_tmpl_footer();
