<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seo
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php if(is_active_sidebar('footer_widgets')) : ?>
				<div class="row">
					<?php dynamic_sidebar('footer_widgets')?>
				</div>
			<?php endif; ?>
		</div>
		<div class="footer-copyright-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="copyright">Copyright &copy;2017, All Right Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
