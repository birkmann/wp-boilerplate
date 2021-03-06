	<footer class="footer-main">
		<div class="wrapper">

			<div class="row">
				<div class="col">
					<?php if ( is_active_sidebar( 'widget-footer-left' ) ) : ?>
						<?php dynamic_sidebar( 'widget-footer-left' ); ?>
					<?php endif; ?>
				</div>

				<div class="col">
					<?php if ( is_active_sidebar( 'widget-footer-center' ) ) : ?>
						<?php dynamic_sidebar( 'widget-footer-center' ); ?>
					<?php endif; ?>
				</div>

				<div class="col">
					<?php if ( is_active_sidebar( 'widget-footer-right' ) ) : ?>
						<?php dynamic_sidebar( 'widget-footer-right' ); ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="bottom">
				<?php if ( is_active_sidebar( 'widget-footer' ) ) : ?>
					<?php dynamic_sidebar( 'widget-footer' ); ?>
				<?php endif; ?>	
			</div>

		</div>
	</footer>
</div> <!-- .page-wrapper -->
<?php wp_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php bloginfo('template_directory'); ?>/assets/scripts/jquery.js"><\/script>'); }</script>
<script src="<?php bloginfo('template_directory'); ?>/assets/scripts/app.js"></script>
</body>
</html>