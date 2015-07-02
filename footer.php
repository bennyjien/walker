				<footer class="site-footer" role="contentinfo">
					<div class="inner wrap">

						<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php printf( __( 'Designed by %1$s.', 'walkertheme' ), '<a href="http://bennyjien.com/" rel="designer">Benny Jien</a>' ); ?></p>

					</div>
				</footer>

			</div> <!-- .site-content -->

		</div> <!-- .container -->

		<?php wp_footer(); ?>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			/*
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-XXXXX-X');
			ga('send', 'pageview');
			*/
		</script>

		<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/js/libs/instantclick.min.js" data-no-instant></script>
		<script data-no-instant>InstantClick.init();</script>

	</body>

</html> <!-- Built with Walker -->
