<?php
gp_title( __('Profile &lt; GlotPress') );
gp_breadcrumb( array( __('Profile') ) );

$per_page = GP::$user->current()->get_meta('per_page');
if ( 0 == $per_page ) {
	$per_page = 15;
}

$default_sort = GP::$user->current()->get_meta('default_sort');
if ( ! is_array( $default_sort ) ) {
	$default_sort = array(
		'by' => 'priority',
		'how' => 'desc'
	);
}

if ( GP_Bootstrap_Theme::has_feature('profile') ) {
	wp_enqueue_script( 'goog-jsapi' ); 
	wp_enqueue_script( 'goog-charts' ); 
	wp_localize_script( 'goog-charts', 'days', $dates ); 
}

gp_tmpl_header();
?>

<h2><?php _e( "Profile" ); ?></h2>

<?php if ( GP_Bootstrap_Theme::has_feature('profile') ) { ?>
<div id="profile">
	<div id="statistics">
		<h3>Statistics: </h3>
		<span><b><?php echo $total_strings; ?></b> <?php _e( "Strings Translated" ); ?></span>
		<span><b><?php echo $project_contrib_count; ?></b> <?php _e( "Projects Contributed to" ); ?></span>
		<div id="week-progress"></div>
	</div>
	<div id="project-shortcuts">
		<h3>Project Shortcuts:</h3>
		<table class="translation-sets proj-shortcuts">
			<thead>
			<tr>
				<th class="">Sub Project</th>
				<th class="header">Set</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach( $shortcuts as $shortcut ): ?>
				<tr>
					<th><?php echo $shortcut['project_path']; ?><?php if ( $shortcut['active'] ) echo "<span class='active bubble'>" . __('Active') . "</span>"; ?></th>
					<td>
						<strong><?php gp_link( $shortcut['link'], $shortcut['contrib']->name_with_locale() ); ?></strong>
						<span> &#45; <?php echo $shortcut['contrib']->current_perc; ?></span>
						<div class="progress-bar"
							 title="
							 <?php echo sprintf("Waiting: %s, Translated: %s, Fuzzy: %s",
								 $shortcut['contrib']->waiting_perc,
								 $shortcut['contrib']->current_perc,
								 $shortcut['contrib']->fuzzy_perc) ;?>">
							<span class="words-reviewed-perc" style="width:<?php echo $shortcut['contrib']->current_perc; ?>%"></span><!--
						 --><span class="words-waiting-perc" style="width:<?php echo $shortcut['contrib']->waiting_perc; ?>%"></span>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<h3>Settings</h3>
<?php } ?>

<form action="" method="post">
		<table class="form-table">
			<tr>
				<th><label for="per_page"><?php _e( "Number of items per page:" ); ?></label></th>
			<td><input type="number" id="per_page" name="per_page" value="<?php echo $per_page ?>"/></td>
		</tr>
		<tr>
			<th><label for="default_sort[by]"><?php _e("Default Sort By:") ?></label></th>
			<td><?php echo gp_radio_buttons('default_sort[by]',
			array(
				'original_date_added' => __('Date added (original)'),
				'translation_date_added' => __('Date added (translation)'),
				'original' => __('Original string'),
				'translation' => __('Translation'),
				'priority' => __('Priority'),
				'references' => __('Filename in source'),
				'random' => __('Random'),
			), gp_array_get( $default_sort, 'by', 'priority' ) ); ?></td>
		</tr>
		<tr>
			<th><label for="default_sort[how]"><?php _e("Default Sort Order:") ?></label></th>
			<td><?php echo gp_radio_buttons('default_sort[how]',
				array(
					'asc' => __('Ascending'),
					'desc' => __('Descending'),
				), gp_array_get( $default_sort, 'how', 'desc' ) );
			?></td>
		</tr>
		<tr>
			<th><label for="default_theme"><?php _e("Theme:") ?></label></th>
			<td>
				<?php
				$default_theme = ( 'default' == GP::$user->current()->get_meta('default_theme') ) ? 'default' : 'bootstrap';

				echo gp_select(
					'default_theme',
					array(
						'default'   => __('Default theme'),
						'bootstrap' => __('Bootstrap theme'),
					),
					$default_theme,
					array(
						'class' => 'form-control'
					)
				);
				?>
			</td>
		</tr>
	</table>
	<br>
	<input type="submit" name="submit" value="<?php esc_attr_e("Change Settings"); ?>">
</form>
<?php gp_tmpl_footer();