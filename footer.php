<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WpAutomate
 */

?>
		</div> <!-- #Row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer container" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wpautomate' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wpautomate' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wpautomate' ), 'wpautomate', '<a href="https://bitbucket.org/prosenjit_itobuz/wpdefaulttheme" rel="designer">Prosenjit Manna</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
