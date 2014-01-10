<?php

class GP_Bootstrap_Theme_Hacks {

	public static function gp_breadcrumb() {
		// We can't change the template of breadcrumbs so some string replaces to correct it.
		$breadcrumbs = gp_breadcrumb();
		$breadcrumbs = str_replace( '<span class="separator">&rarr;</span>', '</li><li>', $breadcrumbs );
		$breadcrumbs = str_replace( '<span class="breadcrumb"></li>', '<ol class="breadcrumb">', $breadcrumbs );
		$breadcrumbs = str_replace( '</a></span>', '</a> &nbsp;', $breadcrumbs );
		$breadcrumbs = str_replace( 'active bubble', 'active bubble label label-primary', $breadcrumbs );
		$breadcrumbs = $breadcrumbs . '</ol>';
		
		echo $breadcrumbs;
	}

}