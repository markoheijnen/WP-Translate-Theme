

				<div class="form-group">
					<label for="project[name]" class="col-sm-4 col-md-3 control-label"><?php _e('Name'); ?></label>
					<div class="col-sm-4">
						<input type="text" id="project[name]" class="form-control" name="project[name]" value="<?php echo esc_html( $project->name ); ?>" />
					</div>
				</div>

				<div class="form-group">
					<label for="project[slug]" class="col-sm-4 col-md-3 control-label"><?php _e('Slug'); ?></label>
					<div class="col-sm-4">
						<input type="text" id="project[slug]" class="form-control" name="project[slug]" value="<?php echo esc_html( $project->slug ); ?>" />
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

				<div class="form-group">
					<label for="project[parent_project_id]" class="col-sm-4 col-md-3 control-label"><?php _e('Parent Project'); ?></label>
					<div class="col-sm-4">
						<?php echo gp_projects_dropdown( 'project[parent_project_id]', $project->parent_project_id, array( 'class' => 'form-control' ) ); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="project[active]" class="col-sm-4 col-md-3 control-label"><?php _e('Active'); ?></label>
					<div class="col-sm-4">
						<input type="checkbox" id="project[active]" name="project[active]" <?php gp_checked( $project->active ); ?> />
					</div>
				</div>

				<?php echo gp_js_focus_on( 'project[name]' ); ?>
