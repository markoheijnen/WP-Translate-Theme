<?php
gp_title( __( 'Create New Glossary &lt; GlotPress' ) );
gp_breadcrumb( array(
	gp_project_links_from_root( $project ),
	gp_link_get( gp_url_project_locale( $project->path, $locale->slug, $translation_set->slug ), $translation_set->name ),
 	__( 'Create Glossary' )
) );
gp_tmpl_header();
?>

		<h2><?php _e( 'Create New Glossary' ); ?></h2>

		<form action="" method="post" class="form-left form-horizontal" role="form">
			<input type="hidden" name="glossary[translation_set_id]" value="<?php echo esc_attr( $glossary->translation_set_id ); ?>" />

			<div class="form-group">
				<label for="glossary-new-description" class="col-sm-4 col-md-3 control-label">
					<?php _e( 'Description (optional)'); ?><br/>
					<small><?php _e('can include HTML'); ?></small>
				</label>

				<div class="col-sm-4">
					<textarea id="glossary-new-description" class="form-control" name="glossary[description]" rows="4" cols="40"></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<input type="submit" name="submit" value="<?php echo esc_attr( __('Create') ); ?>" id="submit" class="btn btn-primary" />
					<span class="or-cancel"><?php _e('or'); ?> <a href="javascript:history.back();"><?php _e('Cancel'); ?></a></span>
				</div>
			</div>
		</form>

<?php gp_tmpl_footer();