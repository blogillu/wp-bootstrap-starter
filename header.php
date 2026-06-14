<?php
/**
 * @package wp-bootstrap-starter
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>
	<?php wp_head(); ?>
</head>
<body>

 <!-- Navigation-->

	
<nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container-fluid">
		 <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>

		<div class="offcanvas offcanvas-start" tabindex="-1" id="primaryNav" aria-labelledby="offcanvasNavbarLabel">
			<div class="offcanvas-header">
				 <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				
				<?php
				wp_nav_menu( [
					'menu'          	=> 'primary',
					'theme_location'	=> 'primary',
					'depth'         	=> 2,
					'container'			=> false,
					'menu_class'    	=> 'navbar-nav justify-content-start flex-grow-1 pe-3',
					 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
				] );
				?>
				<?php get_search_form(); ?>
			</div>
		</div>

<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
</nav>
