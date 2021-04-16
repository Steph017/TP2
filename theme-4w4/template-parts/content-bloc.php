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

<article>
	<p class="icone"><?php echo selectionne_icone($tPropriété['typeCours']);?></p>
    <p><?php echo $tPropriété['sigle'] . "-" . $tPropriété['nbHeure'] . "-" . $tPropriété['typeCours']; ?></p>
	<a href="<?php echo get_permalink(); ?>"> <?php echo $tPropriété['titre']; ?></a>
	<p> session : <?php echo $tPropriété['session']; ?> </p>
	<?php echo selectionne_SVG($tPropriété['typeCours']);?>
</article>
	
