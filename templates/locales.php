<?php
gp_title( __('Locales &lt; GlotPress') );
wp_enqueue_script('common');
wp_enqueue_script('tablesorter');
gp_tmpl_header();
?>

	<h2><?php _e('Locales and Languages'); ?></h2>

	<div class="locales-filter form-inline navbar-default">
		<div class="form-group">
			<label for="locales-filter"><?php _e( 'Filter:' ); ?></label>
			<input id="locales-filter" type="text" placeholder="<?php esc_attr_e('search'); ?>" class="form-control" />
		</div>
	</div>

	<table class="locales tablesorter table table-striped table-bordered table-hover">
		<thead>
		<tr>
			<th class="header"><?php _e( 'Name (in English)' );?></th>
			<th class="header"><?php _e( 'Native name' );?></th>
			<th class="header"><?php _e( 'Language code' );?></th>

		</tr>
		</thead>
		<tbody>
		<?php foreach ( $locales as $locale ) : ?>
			<tr>
				<?php echo "<td>" . gp_link_get( gp_url_join( gp_url_current(), $locale->slug ), $locale->english_name ) . "</td>" ?>
				<?php echo "<td>" . gp_link_get( gp_url_join( gp_url_current(), $locale->slug ), $locale->native_name ) . "</td>" ?>
				<?php echo "<td>" . gp_link_get( gp_url_join( gp_url_current(), $locale->slug ), $locale->slug ) . "</td>" ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<script type="text/javascript" charset="utf-8">
		jQuery(document).ready(function($) {
			$('.locales').tablesorter({
				headers: {
					0: {
						sorter: 'text'
					}
				},
				widgets: ['zebra']
			});

			$('.locales').width($('.locales').width());

			$rows = $('.locales tbody').find('tr');
			$('#locales-filter').bind("change keyup input",function() {
				var words = this.value.toLowerCase().split(' ');

				if ( '' == this.value.trim() ) {
					$rows.show();
				} else {
					$rows.hide();
					$rows.filter(function (i, v) {
						var $t = $(this);
						for ( var d = 0; d < words.length; ++d ) {
							if ( $t.text().toLowerCase().indexOf( words[d] )  != -1 ) {
								return true;
							}
						}
						return false;
					}).show();
				}
			});
		});
	</script>

<?php gp_tmpl_footer();
