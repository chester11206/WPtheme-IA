<?php
/**
 * Template Name: Home
 *
 * This is the most main template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PT_Magazine
 */
// Bail if not home page.
if ( ! is_page_template( 'templates/home.php' )  ) {
	return;
}

get_header(); ?>

	<div id="primary" class="content-area">
		<!-- the template for the front page of Timnig -->
<!-- created by ndshen -->

<?php get_header(); ?>


<!-- this row is for the slide -->
<div class="section-title"><h2 class="widget-title">精選作品</h2></div>
<div class="row image-slider " style="margin-bottom: 10px;">
		
		<div class="col-xs-12">
		
		<div id="main-carousel" class="carousel slide" data-ride="carousel">
		
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
			  
			<?php 
				// the first 4 slides are for the newest news
				// $args_cat = array(
				// 	'include' => '1, 9, 8'
				// );
				
				// $categories = get_categories($args_cat);
				$count = 0;
				$bullets = '';
					
					$args = array( 
						'type' => 'post',
						'posts_per_page' => 4,
						'cat' => 2,
					);
					
					$lastBlog = new WP_Query( $args ); 
					
					if( $lastBlog->have_posts() ):
						
						while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
							
							<div class="item <?php if($count == 0): echo 'active'; endif; ?>">
						      <?php the_post_thumbnail('full'); ?>
						      <div class="carousel-caption">
							      <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
	
								  <!-- <small><?php the_category(' '); ?></small> -->
						      </div>
						    </div>
						    
						    <?php $bullets .= '<li data-target="#main-carousel" data-slide-to="'.$count.'" class="'; ?>
						    <?php if($count == 0): $bullets .='active'; endif; ?>
						    
						    <?php  $bullets .= '"></li>'; ?>
						
						<?php $count++;endwhile;
						
					endif;
					
					wp_reset_postdata();

			?>
			


			<!-- Indicators -->
			  <ol class="carousel-indicators">
			    <?php echo $bullets; ?>
			  </ol>
		    
		  </div>
		
		  <!-- Controls -->
		  <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		
		</div>
		
</div>



		<main id="main" class="site-main" role="main">
			<?php the_content(); ?>

			<?php 

			if ( is_active_sidebar( 'home-page-widget-area' ) ) :
				
				dynamic_sidebar( 'home-page-widget-area' ); 

			else:

	            if ( current_user_can( 'edit_theme_options' ) ) : ?>

	                <p>
	                    <?php echo esc_html__( 'Widgets of Home Page Widget Area will be displayed here. Go to Appearance->Widgets in admin panel to add widgets. All these widgets will be replaced when you start adding widgets.', 'pt-magazine' ); ?>
	                </p>
			    	
			    	<?php 

			   	endif;
				
			endif; ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php

//do_action( 'pt_magazine_action_sidebar' );

do_action( 'pt_magazine_action_sidebar' );
get_footer();