<?php
/**
 * Template part for affichier les blocs de front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

 global $tPropriété;

?>
<!-- affiche des carrousel de l'acceuil-->	
<article class="slide__conteneur">
				<div class="slide">
					<?php the_post_thumbnail('thumbnail'); ?>
					<div class="slide__info">
						<p><?php echo $tPropriété['sigle'] . "-" . $tPropriété['nbHeure'] . "-" . $tPropriété['typeCours']; ?></p>
						<a href="<?php echo get_permalink(); ?>"> <?php echo $tPropriété['titre']; ?></a>
						<p> session : <?php echo $tPropriété['session']; ?> </p>
					</div>
				</div>
			</article>