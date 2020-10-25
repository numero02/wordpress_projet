<?php

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<?php
		
		while ( have_posts() ) :
			the_post();
			echo "<div class='first'>";
			echo '<h1>';
			echo the_title();
			echo '</h1>';
			?>
			<form method="post">
			<label for="tri">TRI : </label>
			<select name="tri" id="tri">
			<option value="ASC">ASCENDANT</option>
			<option value="DESC">DESCENDANT</option>
			</select>
			<br>
			<input type="radio" name="choix" value="ville"> Ville<br>
			<input type="radio" name="choix" value="prix"> Prix<br>
			
			<input type="submit" value="Envoyer">
			</form>
			<?php
			echo "</div>";
			?>
			<?php
			$bool=false;
			if(isset($_POST["tri"]) && isset($_POST["choix"]) ){
				$bool=true;
			}

			the_content();
			if($bool){
				$param= array(	
					'post_type' => 'propriete',
					'posts_per_page' => 10,
					'meta_key'=>$_POST["choix"],
					'orderby' =>'meta_value',
					'order'=>$_POST["tri"]
				);
			}else{
				$param= array(	
					'post_type' => 'propriete',
					'posts_per_page' => 10,
				);
			}
			
			$loop = new WP_Query($param);
			
			while ($loop->have_posts()) {
				
				$loop->the_post();
				
				$image = get_field('image');

                $size = 'medium'; 
				// (thumbnail, medium, large, full or custom size)
				?>
				<div class="entry-content">
					<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					
						<?php if( $image ): ?>
						<?php 
							echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
						?>
						<div class='image'>
						<?php echo wp_get_attachment_image( $image["ID"], $size ); ?>
						</div>
				
				<?php 
					echo '</a>';
					endif; 
				?>
				<?= "ville : ".get_field("ville")."<br>"?>
				<?= "Prix : ".get_field("prix")."$";?>
				
				</div>
				<?php
			}
		endwhile; // End of the loop.
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
