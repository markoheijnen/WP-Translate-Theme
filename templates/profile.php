<?php
gp_title( __('Profile &lt; GlotPress') );
gp_breadcrumb( array( __('Profile') ) );
gp_tmpl_header();

$per_page = GP::$user->current()->get_meta('per_page');
if ( 0 == $per_page ) {
	$per_page = 15;
}

$default_sort = GP::$user->current()->get_meta('default_sort');
if ( ! is_array( $default_sort ) ) {
	$default_sort = array(
		'by' => 'priority',
		'how' => 'DESC'
	);
}
?>

		<h2><?php _e( "Profile" ); ?></h2>

		<form action="" method="post" class="form-left form-horizontal" role="form">
			<div class="form-group">
				<label for="per_page" class="col-sm-4 col-md-3 control-label"><?php _e( "Number of items per page:" ); ?></label>
				<div class="col-sm-4">
					<input type="number" id="per_page" class="form-control" name="per_page" value="<?php echo $per_page ?>" />
				</div>
			</div>

			<div class="form-group">
				<label for="default_sort[by]" class="col-sm-4 col-md-3 control-label"><?php _e("Default Sort By:") ?></label>
				<div class="col-sm-8">
					<div class="radio">
					<?php
					echo gp_radio_buttons(
						'default_sort[by]',
						array(
							'original_date_added'    => __('Date added (original)'),
							'translation_date_added' => __('Date added (translation)'),
							'original'               => __('Original string'),
							'translation'            => __('Translation'),
							'priority'               => __('Priority'),
							'references'             => __('Filename in source'),
							'random'                 => __('Random'),
						),
						gp_array_get( $default_sort, 'by', 'priority' )
					);
					?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="default_sort[how]" class="col-sm-4 col-md-3 control-label"><?php _e("Default Sort Order:") ?></label>
				<div class="col-sm-8">
					<div class="radio">
					<?php
					echo gp_radio_buttons(
						'default_sort[how]',
						array(
							'asc'  => __('Ascending'),
							'desc' => __('Descending'),
						),
						gp_array_get( $default_sort, 'how', 'desc' )
					);
					?>
					</div>
				</div>
			</div>


			<div class="form-group">
				<label for="default_theme" class="col-sm-4 col-md-3 control-label"><?php _e("Theme:") ?></label>
				<div class="col-sm-4">
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
				</div>
			</div>


			<br />

			<div class="form-group">
				<div class="col-sm-offset-4 col-md-offset-3 col-sm-8">
					<button type="submit" name="submit" class="btn btn-primary"><?php esc_attr_e("Change Settings"); ?></button>
				</div>
			</div>
		</form>

<?php gp_tmpl_footer();