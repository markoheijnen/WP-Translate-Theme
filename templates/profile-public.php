<?php
gp_title( __('Profile &lt; GlotPress') );
gp_breadcrumb( array( __('Profile') ) );

gp_tmpl_header();
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
						<img src="<?php echo $user->get_avatar(); ?>" alt="" class="center-block img-circle img-responsive">
					</div>

					<div class="col-xs-12 col-sm-9">
						<h3 id="user-display-name">
							<?php echo $user->display_name; ?> 
							<?php
							if ( $user->admin() ) {
								_e('(Admin)');
							};
							?>
						</h3>

						<p>
							<?php echo vsprintf( _n('%s is a polyglot who contributes to %s',
															'%s is a polyglot who knows %s but also knows %s.', count( $locales ) ),
															array_merge( array( $user->display_name ), array_keys( $locales ) ) ); ?>
						</p>
						<p>
							<strong><?php _e( 'Member Since' ); ?></strong>
							<?php echo date( 'M j, Y', strtotime( $user->user_registered ) ); ?>
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="recent-projects col-sm-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">><?php _e( 'Recent Projects' ); ?></h3>
						</div>

						<ul class="list-group">
						<?php foreach ( $recent_projects as $project ) { ?>
							<li class="list-group-item">
								<p><?php
									echo gp_link_get( $project->project_url, $project->set_name ) . ': ';
									echo gp_link_get(
										$project->project_url . '?filters[status]=either&filters[user_login]=' . $user->user_login, 
										sprintf( _n( '%s contribution', '%s contributions',$project->count ), $project->count )
									);
								?></p>
								<p class="ago">
									<?php echo sprintf( __( 'last translation about %s ago (UTC)' ), gp_time_since( backpress_gmt_strtotime( $project->last_updated ) ) ); ?>
								</p>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>

				<div class="validates-projects col-sm-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"><?php _e( 'Validator to' ); ?></h3>
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
									<?php echo sprintf( '%s is not validating any projects!', $user->display_name ); ?>
								</p>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>

<?php gp_tmpl_footer();