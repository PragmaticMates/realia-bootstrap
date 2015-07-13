<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="page-wrapper">
	<div class="header">
		<nav class="navbar navbar-default">
			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( get_theme_mod( 'realia_bootstrap_general_logo' ) ) : ?>
							<img src="<?php echo get_theme_mod( 'realia_bootstrap_general_logo' ); ?>" alt="<?php echo __( 'Home', 'realia-bootstrap' ); ?>">
						<?php else : ?>
							<?php bloginfo( 'name' ); ?>
						<?php endif; ?>
					</a>

					<p class="navbar-text"><?php bloginfo( 'description' ); ?></p>
				</div>

				<?php $menu = wp_nav_menu( array(
					'menu_class'        => 'nav navbar-nav navbar-right collapse navbar-collapse',
					'walker'            => new Realia_Bootstrap_Menu_Walker(),
					'theme_location'    => 'primary',
					'menu_id'           => 'primary-menu',
					'fallback_cb' 		=> false,
					'echo'              => false,
				) ); ?>

				<?php if ( ! empty( $menu ) ) : ?>
					<?php echo $menu; ?>
				<?php endif; ?>
			</div><!-- /.container -->
		</nav>
	</div><!-- /.header -->

	<div class="main">
		<?php dynamic_sidebar( 'sidebar-top-fullwidth' ); ?>

		<div class="container">
			<?php get_sidebar( 'top' ); ?>

			<?php if ( ! empty( $_SESSION['messages'] ) && is_array( $_SESSION['messages'] ) ) : ?>
				<?php $_SESSION['messages'] = Realia_Utilities::array_unique_multidimensional( $_SESSION['messages'] );?>

				<div class="alerts">
					<?php foreach ( $_SESSION['messages'] as $message ) : ?>
						<div class="alert alert-dismissible alert-<?php echo esc_attr( $message[0] ); ?>">
							<div class="alert-inner">
								<?php echo wp_kses( $message[1], wp_kses_allowed_html( 'post' ) ); ?>

								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="pp pp-normal-circle-cross"></i></button>
							</div><!-- /.alert-inner -->
						</div><!-- /.alert -->
					<?php endforeach; ?>
				</div><!-- /.alerts -->

				<?php unset( $_SESSION['messages'] ); ?>
			<?php endif; ?>
