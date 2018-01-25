<?php
/**
 * Template Name: PPT page
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
                    上課週數
                </h2>
            </div>
		<div class="week-sidebar">
			<?php 
                    $args = array( 
                        'type' => 'post',
                        'cat' =>12,
						'orderby' => date,
						'order' => DESC,
                    );
                    
                    $ppt_query=new WP_Query( $args );
                    
					
					$count = 0;
					if( $ppt_query->have_posts() ):
						while( $ppt_query->have_posts() ): $ppt_query->the_post();
							$count++;
						endwhile;
					endif;
					$wkidx = $count;
                    if( $ppt_query->have_posts() ):
						
            
                        while( $ppt_query->have_posts() ): $ppt_query->the_post();
							 ?>
							<h2>第<?php echo $wkidx ?>週 </h2>
							
							<?php $ppt_link=get_the_content(); echo the_title( '<h3 class="entry-title"><a href="' . $ppt_link . '" rel="bookmark">', '</a></h3>' );
							$wkidx--;
						endwhile;
						
					endif;
					wp_reset_postdata();
			?>
		</div>
        <div class="section-title" style="margin-top:50px;">
            <h2 class="widget-title">
                熱門關鍵字
            </h2>
        </div>
        <div class="ppt-keyord-sidebar" style="color:#ffb8ed;">
			<?php 
                    // $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
                    // $args = array( 
                    //     'type' => 'post',
                    //     'paged'=>$paged,
                    //     'cat' =>12,
					// 	'orderby' => date,
					// 	'order' => DESC,
                    // );
                
                    // query_posts($args);
					
					// $tags="";
					// if( have_posts() ):
					// 	while( have_posts() ): the_post();
					// 		if(has_tag()) {$tags+=the_tags('');$tags+=",";}
					// 	endwhile;
					// endif;
                    // wp_reset_postdata();

                    // echo $tags;


                    $args = array(
                        'smallest'                  => 8, 
                        'largest'                   => 22,
                        'unit'                      => 'pt', 
                        'number'                    => 30,  
                        'format'                    => 'flat',
                        'separator'                 => "\n",
                        'orderby'                   => 'name', 
                        'order'                     => 'ASC',
                        'exclude'                   => null, 
                        'include'                   => null, 
                        'topic_count_text_callback' => default_topic_count_text,
                        'link'                      => 'view', 
                        'taxonomy'                  => 'post_tag', 
                        'echo'                      => true,
                         // see Note!
                    ); 
                    ?>

                    <p id="tagcloud-ppt" style="color:#ffd6f5;"><?php wp_tag_cloud( $args ); ?></p>


			
		</div>
	</div>
	<div class="col-xs-12 col-sm-8">
            <div class="section-title">
                <h2 class="widget-title">
                    上課投影片
                </h2>
            </div>
            <div class="row">
        
                    <?php 
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
                    $args = array( 
                        'type' => 'post',
                        'paged'=>$paged,
                        'posts_per_page' => 3,
                        'cat' =>12,
                    );
                
                    query_posts($args);
                    if( have_posts() ):
        
            
                        while( have_posts() ): the_post(); ?>
                             <?php get_template_part('template-parts/content','ppt'); ?>
                            <?php  // If comments are open or we have at least one comment, load up the comment template.
				            if ( comments_open() || get_comments_number() ) :
					            comments_template();
				            endif; ?>
            
                         <?php endwhile;?>
        
                        <div class="row">
                             <div class="col-xs-6 text-left next-previous"><?php previous_posts_link('« Newer PPT'); ?></div>
                             <div class="col-xs-6 text-right next-previous"><?php next_posts_link('Older PPT »'); ?></div>
                        </div>
                    <?php endif;
                    wp_reset_postdata();		
                    ?>
                </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
