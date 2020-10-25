<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package new-theme
 */

get_header();
?>
	<?php
		if(is_home()){
			echo '<h1 class="home-page">Page d\'Accueil</h1>';
		}	
		
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			
			while ( have_posts() ) :
				
				$n1=0;
				$nombre=0;
				if(!empty(get_theme_mod('configuration_id_nombre'))){
					$nombre=get_theme_mod('configuration_id_nombre');
				}else{
					$nombre = 3;
				}
				the_post();
				
				$param= array(	
					'post_type' => 'propriete',
					'posts_per_page' => $nombre, 
					'order'=>'ASC'
				);

				$loop = new WP_Query($param);
				//loop
				
				while ($loop->have_posts()) {
					
					$n1++;
					$loop->the_post();
					
					?>
					<div class="entry-content">
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
						$image = get_field('image');
						$size = 'medium'; 
						// (thumbnail, medium, large, full or custom size)
						
						if( $image ): ?>
						<div class='image'>
						<?php echo "<a href='" . esc_url( get_permalink() ) . "' rel='bookmark'>"?>
						<?php echo wp_get_attachment_image( $image["ID"], $size ); ?>
						<?php echo '</a>'; ?>
						</div>
						<?php endif; ?>
						<?php
							echo "<p>prix :". get_field("prix")."$</p>";		
							echo "<p>ville :". get_field("ville")."</p>";
						?>
					</div>
					
					<?php
					
				}
				if($n1 == $nombre){
					break;
				}else{
					echo "n1 : ".$n1;
					echo 'nombre : '.$nombre;
				}
				endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
