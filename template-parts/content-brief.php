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

		

		<?php $contet_class =  ( has_post_thumbnail() ) ? 'content-with-image' : 'content-no-image'; ?>

		<div class="content-wrap <?php echo $contet_class; ?>">
			<div class="content-wrap-inner">
				<header class="entry-header">
					<?php

					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

					
					?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>

	</div>

</article><!-- #post-## -->
