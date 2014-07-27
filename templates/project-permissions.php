<?php
gp_title( sprintf( __( 'Permissions &lt; %s &lt; GlotPress' ), $project->name ) );
gp_breadcrumb_project( $project );
gp_tmpl_header();
?>

		<h2><?php _e('Permissions'); ?></h2>

		<h3 id="validators">
			<?php _e('Validators'); ?>
			<?php if ( count( $permissions ) + count( $parent_permissions ) > 10 ): ?>
			<a href="#add" onclick="jQuery('#user_login').focus(); return false;" class="btn btn-primary btn-xs"><?php _e('Add'); ?></a>
			<?php endif; ?>
		</h3>

		<?php if ( $permissions ): ?>
			<?php if ( $parent_permissions ): ?>
			<h4 id="validators"><?php _e('Validators for this project'); ?></h4>
			<?php endif; ?>

			<ul class="permissions">
				<?php foreach( $permissions as $permission ): ?>
					<li>
						<span class="permission-action"><?php _e('user'); ?></span>
						<?php
						if ( GP_Bootstrap_Theme::has_feature('profile') ) {
							echo '<span class="user">' . sprintf( '<a href="%s">%s</a>', gp_url( '/profile/' . $permission->user->user_nicename ), $permission->user->user_login ) . '</span>';
						} else {
							echo '<span class="user">' . esc_html( $permission->user->user_login ) . '</span>';
						}
						?>

						<span class="permission-action"><?php printf( __('can %s strings with locale'), esc_html( $permission->action ) ); ?></span>
						<span class="user"><?php echo esc_html( $permission->locale_slug ); ?></span>
						<span class="permission-action"><?php _e('and slug'); ?></span>
						<span class="user"><?php echo esc_html( $permission->set_slug ); ?></span>
						<a href="<?php echo gp_url_join( gp_url_current(), '-delete/'.$permission->id ); ?>" class="action delete"><?php _e('Remove'); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( $parent_permissions ): ?>
		<h4 id="validators"><?php _e('Validators for parent projects'); ?></h4>
		<ul class="permissions">
			<?php foreach( $parent_permissions as $permission ): ?>
				<li>
					<span class="permission-action"><?php _e('user'); ?></span>
					<?php
					if ( GP_Bootstrap_Theme::has_feature('profile') ) {
						echo '<span class="user">' . sprintf( '<a href="%s">%s</a>', gp_url( '/profile/' . $permission->user->user_nicename ), $permission->user->user_login ) . '</span>';
					} else {
						echo '<span class="user">' . esc_html( $permission->user->user_login ) . '</span>';
					}
					?>

					<span class="permission-action"><?php printf(__('can %s strings with locale'), esc_html( $permission->action )); ?></span>
					<span class="user"><?php echo esc_html( $permission->locale_slug ); ?></span>
					<span class="permission-action"><?php _e('and slug'); ?></span>
					<span class="user"><?php echo esc_html( $permission->set_slug ); ?></span>
					<span class="permission-action"><?php _e('in the project'); ?> </span>
					<span class="user"><?php gp_link_project( $permission->project, esc_html( $permission->project->name ) ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>

		<?php if ( ! $permissions && !$parent_permissions ): ?>
			<strong><?php _e('No validators defined for this project.'); ?></strong>
		<?php endif; ?>


		<form action="" method="post"  class="form-left form-horizontal" role="form">
			<h3 id="add"><?php _e('Add a validator for this project'); ?></h3>

			<div class="form-group">
				<label for="user_login" class="col-sm-4 col-md-3 control-label"><?php _e('Username:'); ?></label>
				<div class="col-sm-4">
					<input type="text" id="user_login" class="form-control" name="user_login" />
				</div>
			</div>

			<div class="form-group">
				<label for="locale" class="col-sm-4 col-md-3 control-label"><?php _e('Locale:'); ?></label>
				<div class="col-sm-4">
					<?php echo gp_locales_dropdown( 'locale', null, array( 'class' => 'form-control' ) ); ?>
				</div>
			</div>

			<div class="form-group">
				<label for="set-slug" class="col-sm-4 col-md-3 control-label"><?php _e('Translation set slug:'); ?></label>
				<div class="col-sm-4">
					<input type="text" id="set-slug" class="form-control" name="set-slug" value="default" />
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<button type="submit" name="submit" class="btn btn-primary"><?php echo esc_attr( __('Add') ); ?></button>
					<input type="hidden" name="action" value="add-validator" />
				</div>
			</div>
		</form>

<?php
gp_tmpl_footer();