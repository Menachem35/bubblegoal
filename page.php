<?php get_header(); ?>

	<div class="row" id="inner_page_bg">			
		
		<div class="inner_box">					
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>

			<?php endwhile; else: ?>
				<p><?php _e('Sorry, this page does not exist.'); ?></p>
			<?php endif; ?>
		</div>					              					
	</div><!--row -->
			

<?php get_footer(); ?>
