<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width">
	<title><?php echo gp_title(); ?></title>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php echo gp_url_base_root(); ?>plugins/child-theme/templates/js/html5shiv.js" defer></script>
		<script src="<?php echo gp_url_base_root(); ?>plugins/child-theme/templates/js/respond.js" defer></script>
	<![endif]-->

	<?php gp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<script type="text/javascript">document.body.className = document.body.className.replace('no-js','js');</script>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-content">
					<span class="sr-only"><?php _e('Toggle navigation'); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo gp_url( '/' ); ?>" rel="home">
					<?php echo defined('GP_TITLE') ? GP_TITLE : 'GlotPress'; ?>
				</a>
			</div>

			<nav class="collapse navbar-collapse navbar-content" role="navigation">
				<ul class="nav navbar-nav navbar-right">

					<?php
					if ( GP::$user->logged_in() ):
						$user = GP::$user->current();

						echo '<li><a href="' . gp_url( '/profile' ) . '">';
						printf( __( 'Hi, %s.' ), $user->user_login );
						echo '</a></li>';
					?>

					<li><a href="<?php echo gp_url('/logout')?>"><?php _e('Log out'); ?></a></li>
					<?php else: ?>

					<li><a href="<?php echo gp_url_login(); ?>"><?php _e('Log in'); ?></a></li>
					<?php endif; ?>
					<?php do_action( 'after_hello' ); ?>

				</ul>
			</nav>
		</div>
	</div>

	<div class="container">
		<?php
		echo GP_Bootstrap_Theme_Hacks::gp_breadcrumb();
		?>
	</div>

	<div class="container">
		<?php if (gp_notice('error')): ?>
			<div class="alert alert-danger">
				<?php echo gp_notice( 'error' ); //TODO: run kses on notices ?>
			</div>
		<?php endif; ?>
		<?php if (gp_notice()): ?>
			<div class="alert alert-info">
				<?php echo gp_notice(); ?>
			</div>
		<?php endif; ?>
		<?php do_action( 'after_notices' ); ?>
	</div>

	<div id="content" class="container">
