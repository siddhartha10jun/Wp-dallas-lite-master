<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Dallas_Lite
 */
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wp_dallas_lite_posted_on(); ?>		
			
		</div><!-- .entry-meta -->
		<?php
		endif;

	
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
				<div class="post-thumbnail"><?php the_post_thumbnail();  ?></div>	
				<p class="short-description"><?php if ( is_single() ) { ?>
					<div class="single-entry-content">
						<?php the_content();?>
					</div>
				<?php } else {
					 if ( get_theme_mod( 'enableExcerpt', true ) ) { 
						if ( get_theme_mod( 'excerptwordLimit', 330 ) ) {
							$textlimit = get_theme_mod( 'excerptwordLimit', 330 );
							echo wpdallas_excerpt_max_charlength($textlimit);
						} else {
						 echo  the_content();
						}
						if ( get_theme_mod( 'enableBlogReadmore', true ) ) { 
							if ( get_theme_mod( 'continueReading', 'Continue reading...' ) ) {
								$continue = esc_html( get_theme_mod( 'continueReading', 'Continue reading...' ) );
								echo '<div class="meta-content-limit"></div>';
								echo '<a class="btn btn-primary" href="'.get_permalink().'">'. $continue .'</a>';

							} 
						}  
					}else{
					 	echo  the_content();
					} 
				} 
			?></p>
			<?php 
				
			/*
			//This is default comment for wpdallas Blog Excerpts setting implimentaion   	

			the_content( sprintf(
				wp_kses(
				 //translators: %s: Name of current post. Only visible to screen readers 
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp_dallas_lite' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) ); */

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp_dallas_lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
		<?php echo add_social_share_icons($content); ?>

</article><!-- #post-<?php the_ID(); ?> -->
