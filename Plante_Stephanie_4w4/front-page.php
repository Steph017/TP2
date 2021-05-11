<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

get_header();
?>

<!-- Debut du carrousel -->

	<!--	<section class="carrousel-2">
			<article class="slide__conteneur">
				<div class="slide">
					<img src="" alt="">
					<div class="slide__info">
						<p>582-4W4 - 90H - WEB</p>
						<a href="http://localhost/4w4/2020/10/07/582-3w3-creation-de-sites-web-dynamiques-90h/">Création de site web dynamique</a>
						<p>Session : 4</p>
					</div>
				</div>
			</article>
			<article class="slide__conteneur">
				<div class="slide">
					<img src="" alt="">
					<div class="slide__info">
						<p>582-4W4 - 90H - WEB</p>
						<a href="http://localhost/4w4/2020/10/07/582-3w3-creation-de-sites-web-dynamiques-90h/">Création de site web dynamique</a>
						<p>Session : 4</p>
					</div>
				</div>
			</article>
			<article class="slide__conteneur">
				<div class="slide">
					<img src="" alt="">
					<div class="slide__info">
						<p>582-4W4 - 90H - WEB</p>
						<a href="http://localhost/4w4/2020/10/07/582-3w3-creation-de-sites-web-dynamiques-90h/">Création de site web dynamique</a>
						<p>Session : 4</p>
					</div>
				</div>
			</article>
		</section>
		<section class="ctrl-carrousel">
		<input type="radio" name="radio">
		<input type="radio"  name="radio">
		<input type="radio" name="radio">
		</section>-->
		
	<!-- fin du carrousel -->
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">Acceuil</h1>
				<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="list-cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXXX";
			$ctrl_radio = "";
			while ( have_posts() ) :
				the_post();
               convertir_tableau($tPropriété);
               if ( $tPropriété['typeCours'] != $precedent) : ?>
					<?php if ($precedent != "XXXXXXX"): ?>
					</section>
					
					<?php if (in_array($precedent, ['Web', 'Jeu', 'Spécifique'])): ?>
							<section class="ctrl-carrousel">
								<?php echo $ctrl_radio; 
								$ctrl_radio = '';
								?>
							</section>
							<?php endif ?>
						<?php endif; ?>
					<h2><?php echo $tPropriété['typeCours'] ?></h2>
					<!-- code pour aller chercher les categories -->		
						<section <?php echo  class_composant($tPropriété['typeCours']) ?>>
					<?php endif; ?>

					<!-- modification de la forme des blocs de cours -->
							   
				<?php
				if (in_array($tPropriété['typeCours'], ['Web', 'Jeu', 'Spécifique'])): 	
					get_template_part( 'template-parts/content', 'carrousel' );
					$ctrl_radio .= '<input class="rad-carrousel"  type="radio" name="rad-'.$tPropriété['typeCours'].'">';
				elseif ($tPropriété['typeCours'] == 'Projet') :
					get_template_part( 'template-parts/content', 'galerie' );
				else:
					get_template_part( 'template-parts/content', 'bloc' );
				endif;
				$precedent = $tPropriété['typeCours'];
			
			endwhile; ?>
				</section>
				<?php endif; ?>

				<section class="admin-rapid">
					<h3>Ajouter un article de catégorie : Nouvelles</h3>
					<input type="text" name="title" placeholder="Titre">
					<textarea name="content"></textarea>
					<button id="bout-rapide">Ajouter une nouvelle</button>
				</section>

			<section class="nouvelles">
				<button id="bouton_nouvelles">
					Afficher les trois dernieres nouvelles.
				</button>
				<section>
				</section>
			</section>
			
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();

function convertir_tableau(&$tPropriété){
	
	$titre_grand = get_the_title();
	$tPropriété['session'] = substr($titre_grand,4, 1);
	$tPropriété['nbHeure'] = substr($titre_grand,-4, 3);
	$tPropriété['titre'] = substr($titre_grand,8, -6);
	$tPropriété['sigle'] = substr($titre_grand,0, 7);
	$tPropriété['typeCours'] = get_field('type_de_cours');
}


function class_composant($typeCours){
	if(in_array($typeCours, ['Web', 'Jeu', 'Spécifique'])){
		return 'class="carrousel-2"';
	}
	elseif($typeCours == 'Projet'){
		return 'class="galerie"';
	}
	else{
		return 'class="bloc"';
	}
}


/*-------------------------------------------------------------
ajout d'icone en fonction du type de cours
--------------------------------------------------------------- */
function selectionne_icone($typeCours){
	switch($typeCours){
		case "Web" :
			return '<img src="https://s2.svgbox.net/hero-solid.svg?ic=code&color=000000" width="50" height="50">';
		
		case "Spécifique" :
			return '<img src="https://s2.svgbox.net/hero-solid.svg?ic=badge-check&color=000000" width="50" height="50">';
		
		case "Jeu" :
			return '<img src="https://s2.svgbox.net/hero-solid.svg?ic=video-camera&color=000000" width="50" height="50">';

		case "Image 2d/3d" :
			return '<img src="https://s2.svgbox.net/hero-solid.svg?ic=color-swatch&color=000000" width="50" height="50">';
		
		case "Conception" :
			return '<img src="https://s2.svgbox.net/hero-solid.svg?ic=desktop-computer&color=000000" width="50" height="50">';
	}
}
/*-------------------------------------------------------------
ajout de SVG par type de cours
--------------------------------------------------------------- */
function selectionne_SVG($typeCours){
	switch($typeCours){
		case "Web" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#E2F8F5" fill-opacity="1" d="M0,192L18.5,170.7C36.9,149,74,107,111,106.7C147.7,107,185,149,222,170.7C258.5,192,295,192,332,208C369.2,224,406,256,443,250.7C480,
			245,517,203,554,154.7C590.8,107,628,53,665,53.3C701.5,53,738,107,775,112C812.3,117,849,75,886,90.7C923.1,107,960,181,997,229.3C1033.8,277,1071,299,1108,282.7C1144.6,267,1182,213,1218,197.3C1255.4,181,1292,203,1329,176C1366.2,149,1403,75,1422,37.3L1440,0L1440,
			320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,
			320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>';
		
		case "Spécifique" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#E2F8F5" fill-opacity="1" d="M0,192L18.5,170.7C36.9,149,74,107,111,106.7C147.7,107,185,149,222,170.7C258.5,192,295,192,332,208C369.2,224,406,256,443,250.7C480,245,517,
			203,554,154.7C590.8,107,628,53,665,53.3C701.5,53,738,107,775,112C812.3,117,849,75,886,90.7C923.1,107,960,
			181,997,229.3C1033.8,277,1071,299,1108,282.7C1144.6,267,1182,213,1218,197.3C1255.4,181,1292,203,1329,176C1366.2,149,1403,75,1422,37.3L1440,
			0L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,
			320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>';
		
		case "Jeu" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f4e2f7" fill-opacity="1" d="M0,192L18.5,170.7C36.9,149,74,107,111,106.7C147.7,107,185,149,222,170.7C258.5,192,295,192,332,208C369.2,224,406,256,443,250.7C480,245,517,203,554,154.7C590.8,107,628,53,665,53.3C701.5,
			53,738,107,775,112C812.3,117,849,75,886,90.7C923.1,107,960,181,997,229.3C1033.8,277,1071,299,1108,282.7C1144.6,267,1182,213,1218,197.3C1255.4,181,1292,203,1329,176C1366.2,149,1403,75,1422,37.3L1440,0L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,
			1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>';

		case "Image 2d/3d" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f7e2e5" fill-opacity="1" d="M0,192L18.5,170.7C36.9,149,74,107,111,106.7C147.7,107,185,149,222,170.7C258.5,192,295,192,332,208C369.2,224,406,256,443,250.7C480,
			245,517,203,554,154.7C590.8,107,628,53,665,53.3C701.5,53,738,107,775,112C812.3,117,849,75,886,90.7C923.1,107,960,181,997,229.3C1033.8,277,1071,299,1108,282.7C1144.6,267,1182,213,1218,197.3C1255.4,181,1292,203,1329,176C1366.2,149,1403,75,1422,37.3L1440,0L1440,320L1421.5,320C1403.1,320,1366,320,1329,
			320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>';
		
		case "Conception" :
			return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e5f7e2" fill-opacity="1" d="M0,192L18.5,170.7C36.9,149,74,107,111,106.7C147.7,107,185,149,222,170.7C258.5,192,295,192,332,208C369.2,224,406,256,443,250.7C480,245,517,203,554,154.7C590.8,107,628,53,665,53.3C701.5,53,738,107,775,112C812.3,117,849,75,886,90.7C923.1,107,960,181,997,229.3C1033.8,277,1071,299,1108,282.7C1144.6,267,
			1182,213,1218,197.3C1255.4,181,1292,203,1329,176C1366.2,149,1403,75,1422,37.3L1440,0L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,
			111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>';
	}
}