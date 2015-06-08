	<footer class="footer-main">
		<div class="wrapper">
			<?php if ( is_active_sidebar( 'widget-footer' ) ) : ?>
				<?php dynamic_sidebar( 'widget-footer' ); ?>
			<?php endif; ?>
		</div>
	</footer>
</div> <!-- .page-wrapper -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>if (!window.jQuery) { document.write('<script src="<?php bloginfo('template_directory'); ?>/assets/scripts/jquery.js"><\/script>'); }
</script>
<script src="<?php bloginfo('template_directory'); ?>/assets/scripts/app.js"></script>
</body>
</html>