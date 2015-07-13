			<?php dynamic_sidebar( 'sidebar-bottom' ); ?>
		</div><!-- /.container -->
	</div><!-- /.main -->

	<div class="footer">
		<?php if ( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' ) || is_active_sidebar( 'footer-fourth' )) : ?>
			<div class="footer-top">
				<div class="container">
					<div class="footer-top-inner">
						<div class="row">
							<?php if ( is_active_sidebar( 'footer-first' ) ) : ?>
								<div class="widget-container col-sm-6 col-md-3">
									<?php dynamic_sidebar( 'footer-first' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'footer-second' ) ) : ?>
								<div class="widget-container col-sm-6 col-md-3">
									<?php dynamic_sidebar( 'footer-second' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'footer-third' ) ) : ?>
								<div class="widget-container col-sm-6 col-md-3">
									<?php dynamic_sidebar( 'footer-third' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'footer-fourth' ) ) : ?>
								<div class="widget-container col-sm-6 col-md-3">
									<?php dynamic_sidebar( 'footer-fourth' ); ?>
								</div>
							<?php endif; ?>
						</div><!-- /.row -->
					</div><!-- /.footer-bottom-inner -->
				</div><!-- /.container -->
			</div><!-- /.footer-top -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-bottom-left') || is_active_sidebar( 'footer-bottom-right' ) ) : ?>
			<div class="footer-bottom">
				<div class="container">
					<div class="footer-bottom-inner">
						<?php if ( is_active_sidebar( 'footer-bottom-left' ) || is_active_sidebar( 'footer-bottom-right' )) : ?>
							<?php if ( is_active_sidebar( 'footer-bottom-left' ) ) : ?>
								<div class="footer-bottom-left">
									<?php dynamic_sidebar( 'footer-bottom-left' ); ?>
								</div><!-- /.footer-bottom-left -->
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'footer-bottom-right' ) ) : ?>
								<div class="footer-bottom-right">
									<?php dynamic_sidebar( 'footer-bottom-right' ); ?>
								</div><!-- /.footer-bottom-left -->
							<?php endif; ?>
						<?php endif; ?>
					</div><!-- /.footer-bottom-inner -->
				</div><!-- /.container -->
			</div><!-- /.footer-bottom -->
		<?php endif; ?>
	</div><!-- /.footer -->
</div><!-- /.page-wrapper -->

<?php wp_footer(); ?>

</body>
</html>