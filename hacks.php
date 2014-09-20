<?php

class GP_Bootstrap_Theme_Hacks {

	public static function gp_breadcrumb() {
		// We can't change the template of breadcrumbs so some string replaces to correct it.
		$breadcrumbs = gp_breadcrumb();
		$breadcrumbs = str_replace( '<span class="separator">&rarr;</span>', '</li><li>', $breadcrumbs );
		$breadcrumbs = str_replace( '<span class="breadcrumb"></li>', '<ol class="breadcrumb">', $breadcrumbs );
		$breadcrumbs = str_replace( '</a></span>', '</a> &nbsp;', $breadcrumbs );
		$breadcrumbs = $breadcrumbs . '</ol>';
		
		echo $breadcrumbs;
	}

	public static function gp_project_actions( $project, $translation_sets ) {
		ob_start();
		gp_project_actions( $project, $translation_sets );
		$output = ob_get_contents();
		ob_end_clean();

		$output = str_replace( ' &darr; ', '', $output );
		$output = str_replace( '<ul>', '<ul class="dropdown-menu" role="menu">', $output );

		echo $output;
	}

	public function gp_pagination( $page, $per_page, $objects ) {
		$surrounding = 2;
		$prev  = $first = $prev_dots = $prev_pages = $current = $next_pages = $next_dots = $last = $next = '';
		$page  = intval( $page ) ? intval( $page ) : 1;
		$pages = ceil( $objects / $per_page );

		if ( $page > $pages ) {
			return '';
		}

		if ( $page > 1 ) {
			$prev = gp_link_get( add_query_arg( array( 'page' => $page - 1 ) ), '&larr;', array( 'class' => 'previous', 'before' => '<li>', 'after' => '</li>' ) );
		}
		else {
			$prev = '<li class="disabled"><span>&larr;</span></li>';
		}

		if ( $page < $pages ) {
			$next = gp_link_get( add_query_arg( array( 'page' => $page + 1 ) ), '&rarr;', array( 'class' => 'next', 'before' => '<li>', 'after' => '</li>' ) );
		}
		else {
			$next = '<li class="disabled"><span>&rarr;</span></li>';
		}

		$current = '<li class="active"><span>' . $page . '</span></li>';

		if ( $page > 1 ) {
			$prev_pages = array();

			foreach( range( max( 1, $page - $surrounding ), $page - 1 ) as $prev_page ) {
				$prev_pages[] = gp_link_get( add_query_arg( array( 'page' => $prev_page ) ), $prev_page, array( 'before' => '<li>', 'after' => '</li>' ) );
			}

			$prev_pages = implode( ' ', $prev_pages );

			if ( $page - $surrounding > 1 ) {
				$prev_dots = '<li><span class="dots">&hellip;</span></li>';
			}
		}

		if ( $page < $pages ) {
			$next_pages = array();

			foreach ( range( $page + 1, min( $pages, $page + $surrounding ) ) as $next_page ) {
				$next_pages[] = gp_link_get( add_query_arg( array( 'page' => $next_page ) ), $next_page, array( 'before' => '<li>', 'after' => '</li>' ) );
			}

			$next_pages = implode( ' ', $next_pages );

			if ( $page + $surrounding < $pages ) {
				$next_dots = '<li><span class="dots">&hellip;</span></li>';
			}
		}

		if ( $prev_dots ) {
			$first = gp_link_get( add_query_arg( array( 'page' => 1 ) ), 1, array( 'before' => '<li>', 'after' => '</li>' ) );
		}

		if ( $next_dots ) {
			$last = gp_link_get( add_query_arg( array( 'page' => $pages ) ), $pages, array( 'before' => '<li>', 'after' => '</li>' ) );
		}

		$html  = '<ul class="pagination">';
		$html .= "
			$prev
			$first
			$prev_dots
			$prev_pages
			$current
			$next_pages
			$next_dots
			$last
			$next";
		$html .= '</ul>';

		return apply_filters( 'gp_pagination', $html, $page, $per_page, $objects );
	}

	public static function gp_radio_buttons( $name, $radio_buttons, $checked_key ) {
		$res = '';

		foreach( $radio_buttons as $value => $label ) {
			$checked = $value == $checked_key ? ' checked="checked"' : '';

			$res .= "\t";
			$res .= '<div class="radio">';
			$res .= '<label for="' . $name . '[' . $value . ']">';
			$res .= '<input type="radio" name="' . $name . '" value="' . esc_attr( $value ) . '" ' . $checked . ' id=" ' . $name . '[' . $value . ']"/>&nbsp;';
			$res .= esc_html( $label ) . '</label>';
			$res .= "</div>\n";
		}

		return $res;
	}

}