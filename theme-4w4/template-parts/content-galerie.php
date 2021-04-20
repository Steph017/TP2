<?php
/**
 * Template part for affichier les blocs de front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */ 
?>
	
<article class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
        <?php the_post_thumbnail('thumbnail'); ?>
    </div>
    <div class="flip-card-back">
      <p><a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a></p>
    </div>
  </div>
</article>