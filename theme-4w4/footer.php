<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-4w4
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://www.cmaisonneuve.qc.ca/', 'College de Maisonneuve' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Collège de Maisonneuve' ));
				?>
			</a>
			<span class="sep">  </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Page réalisée %1$s par : %2$s', ), '', '<a href="https://www.linkedin.com/in/st%C3%A9phanie-plante-039b781b5?trk=people-guest_people_search-card">Stéphanie Plante</a>' );
				?>
				<!-- bouton pour revenir dans le haut de la page -->
				<a href="#" class="top">Haut de page</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
