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

	<!-- <div class="article-wrap-inner"> -->

		<?php if ( has_post_thumbnail() ) : $urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>

			<!-- <div class="featured-thumb"> -->
			<a href="<?php $ppt_link=get_the_content(); echo $ppt_link?>">
				<div class="blog-element" style="background-image: url(<?php echo $urlImg; ?>);">
				
				</div>
			</a>
			<!-- </div> -->

		<?php endif; ?>

		<?php $contet_class =  ( has_post_thumbnail() ) ? 'content-with-image' : 'content-no-image'; ?>

		<div class="content-wrap <?php echo $contet_class; ?> content-ppt">
			<div class="content-wrap-inner">
				<header class="entry-header">
					<?php

					the_title( '<div class="section-title"><h2 class="widget-title"><a href="' . esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2></div>' );

					if ( 'post' === get_post_type() ) : ?>
						<!-- <div class="entry-meta"> -->
							<?php //pt_magazine_entry_header(); ?>
						<!-- </div>.entry-meta -->
						<?php
					endif;
					?>
				</header><!-- .entry-header -->

				<div class="entry-content">
                    <?php the_content(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>

	<!-- </div> -->

</article><!-- #post-## -->
