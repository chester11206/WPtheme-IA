<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PT_Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="article-wrap-inner">

		

		<?php //$contet_class =  ( has_post_thumbnail() ) ? 'content-with-image' : 'content-no-image'; ?>

		<div class="content-wrap <?php //echo $contet_class; ?>">
			<div class="content-wrap-inner">
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				<header class="entry-header text-center">
					<?php
					
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					
					?>
				</header><!-- .entry-header -->

				
			</div>
		</div>

	</div>

</article><!-- #post-## -->
