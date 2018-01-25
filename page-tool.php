<?php
/**
 * Template Name: Tool page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PT_Magazine
 */

get_header(); ?>

<div class="row">
	<div class="col-xs-12 col-sm-4">
		<div class="section-title">
                <h2 class="widget-title">
                    工具列表
                </h2>
            </div>
		<div class="tool-sidebar">
            <?php 
                    $args = array( 
                        'type' => 'post',
                        'cat' =>18,
						'orderby' => date,
						'order' => DESC,
                    );
                    
                    $tools_query=new WP_Query( $args );
					
                    if($tools_query-> have_posts() ):
						
            
                        while( $tools_query->have_posts() ): $tools_query->the_post();
							
							the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h3>' ); 
							
							
						endwhile;
						
					endif;
					wp_reset_postdata();
			?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-8">

            <div class="row">
        
                    <?php 
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
                    $args = array( 
                        'type' => 'post',
                        'paged'=>$paged,
                        'posts_per_page' => 4,
                        'cat' =>18,
                    );
                
                    query_posts($args);
                    if( have_posts() ):

                        while( have_posts() ): the_post(); ?>
                             <?php get_template_part('template-parts/content','tool'); ?>
                            <?php  // If comments are open or we have at least one comment, load up the comment template.
				            if ( comments_open() || get_comments_number() ) :
					            comments_template();
				            endif; ?>
            
                         <?php endwhile;?>
        
                        <div class="row">
                             <div class="col-xs-6 text-left next-previous"><?php previous_posts_link('«Previous Tools'); ?></div>
                             <div class="col-xs-6 text-right next-previous"><?php next_posts_link('More Tools »'); ?></div>
                        </div>
                    <?php endif;
                    wp_reset_postdata();		
                    ?>
                </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
