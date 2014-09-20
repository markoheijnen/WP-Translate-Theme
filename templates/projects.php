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

		<p>
			<?php gp_link( gp_url( '/languages' ), __('Projects by language'), array( 'class' => 'btn btn-primary' ) ); ?>

			<?php if ( GP::$user->current()->can( 'write', 'project' ) ): ?>
				<?php gp_link( gp_url_project( '-new' ), __('Create a New Project'), array( 'class' => 'btn btn-default' ) ); ?>
			<?php endif; ?>
		</p>

		

<?php gp_tmpl_footer();