
			<div class="form-group">
				<label for="set[locale]" class="col-sm-4 col-md-3 control-label"><?php _e('Locale'); ?></label>
				<div class="col-sm-4">
					<?php echo gp_locales_dropdown( 'set[locale]', $set->locale, array( 'class' => 'form-control' ) ); ?>
					<a href="#" id="copy"><?php _e('Use as name'); ?></a>
				</div>
			</div>

			<div class="form-group">
				<label for="set[name]" class="col-sm-4 col-md-3 control-label"><?php _e('Name'); ?></label>
				<div class="col-sm-4">
					<input type="text" id="set[name]" class="form-control" name="set[name]" value="<?php echo esc_html( $set->name ); ?>" />
				</div>
			</div>

			<!-- TODO: make slug edit WordPress style -->
			<div class="form-group">
				<label for="set[slug]" class="col-sm-4 col-md-3 control-label"><?php _e('Slug'); ?></label>
				<div class="col-sm-4">
					<input type="text" id="set[slug]" class="form-control" name="set[slug]" value="<?php echo esc_html( $set->slug? $set->slug : 'default' ); ?>" />
				</div>
			</div>

			<div class="form-group">
				<label for="set[project_id]" class="col-sm-4 col-md-3 control-label"><?php _e('Project'); ?></label>
				<div class="col-sm-4">
					<?php echo gp_projects_dropdown( 'set[project_id]', $set->project_id, array( 'class' => 'form-control' ) ); ?>
				</div>
			</div>

			<?php echo gp_js_focus_on( 'set[locale]' ); ?>

			<script type="text/javascript">
				jQuery(function($){
					$('#copy').click(function() {
						$('#set\\[name\\]').val($('#set\\[locale\\] option:selected').html().replace(/^\S+\s+\S+\s+/, '').replace(/&mdash|—/, ''));
						return false;
					});
				});
			</script>
