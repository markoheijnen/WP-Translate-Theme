<?php
gp_title( __('Profile &lt; GlotPress') );
gp_breadcrumb( array( __('Profile') ) );

wp_enqueue_script( 'goog-jsapi' );
wp_enqueue_script( 'goog-charts' );
wp_localize_script( 'goog-charts', 'days', $dates );
gp_tmpl_header();

$grav_url = 'http://www.gravatar.com/avatar/' . md5( strtolower( $user->user_email ) ) . '?s=150';
?>

		<div id="profile">
			<h2>
				<?php _e( 'User Profile' ); ?>
				<?php
				if ( $user->current() == $user ) {
					echo gp_link( '', __('(edit)') );
				}
				?>
			</h2>

			<div class="panel panel-default">
				<div class="row">
					<div class="col-xs-12 col-sm-3 text-center">
						<img src="<?php echo $grav_url; ?>" alt="" class="center-block img-circle img-responsive">
					</div>

					<div class="col-xs-12 col-sm-9">
						<h3 id="user-display-name">
							<?php echo $user_display_name; ?> 
							<?php
							if ( $user_is_admin ) {
								_e('(Admin)');
							};
							?>
						</h3>

						<p>
							<strong>About:</strong> 
							<?php echo vsprintf( _n('%s is a polyglot who contributes to %s',
															'%s is a polyglot who knows %s but also knows %s.', count( $locale_data ) ),
															array_merge( array( $user_display_name ), array_keys( $locale_data ) ) ); ?>
						</p>
						<p>
							<strong>Member Since:</strong>
							<?php echo date( 'M j, Y', strtotime( $user_registered ) ); ?>
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="recent-projects col-sm-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Recent Projects</h3>
						</div>

						<ul class="list-group">
						<?php foreach ( $recent_actions as $action ) { ?>
							<li class="list-group-item">
								<p>
									<?php echo sprintf( '%s: %s contributions', gp_link_get( $action->project_url, $action->set_name ), $action->count ); ?>
								</p>
								<p class="ago">
									<?php echo sprintf( 'last translation about %s ago (UTC)', $action->human_time ); ?>
								</p>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>

				<div class="validates-projects col-sm-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Validator of</h3>
						</div>

						<?php if ( count( $permissions) >= 1 ) { ?>
						<ul class="list-group">
							<?php foreach ( $permissions as $permission ) { ?>
							<li class="list-group-item">
								<p><?php echo sprintf( '%s', gp_link_get( $permission->project_url, $permission->set_name) ); ?></p>
							</li>
							<?php } ?>
						</ul>
						<?php } else { ?>
							<div class="panel-body">
								<p>
									<?php echo sprintf( '%s is not validating any projects!', $user_display_name ); ?>
								</p>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div id="profile">
				<div id="statistics">
					<h3>Statistics:</h3>
					<p>
						<strong><?php echo $total_strings; ?></strong> <?php _e( 'Strings Translated' ); ?>
						<strong><?php echo $project_contrib_count; ?></strong> <?php _e( 'Projects Contributed to' ); ?>
					</p>

					<div id="week-progress"></div>
				</div>
			</div>
		</div>

<?php gp_tmpl_footer();