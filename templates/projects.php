<?php
gp_title( __('Projects &lt; GlotPress') );
gp_tmpl_header();
?>

		<h2><?php printf( __('Projects') ); ?></h2>

		<ul class="list-group">
		<?php foreach($projects as $project): ?>
			<li class="list-group-item">
				<?php gp_link_project( $project, esc_html( $project->name ) ); ?>
				<?php gp_link_project_edit( $project, null, array( 'class' => 'btn btn-xs btn-primary' ) ); ?>
			</li>
		<?php endforeach; ?>
		</ul>

		<?php if ( GP::$user->current()->can( 'write', 'project' ) ): ?>
			<p class="actionlist secondary"><?php gp_link( gp_url_project( '-new' ), __('Create a New Project') ); ?></p>
		<?php endif; ?>

<?php gp_tmpl_footer(); ?>
