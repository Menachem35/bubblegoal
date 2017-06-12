<?php get_header(); ?>

	<div class="row" id="SliderBox">
	
		<div class="video-container">					
			<iframe width="1480" src="https://www.youtube.com/embed/gelLbSStH4c?rel=0&controls=0&showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
		
		</div>
							              					
	</div><!--row -->
				
				
	<!-- Yellow Box HP -->
	<div class="row" id="yelloBoxHP">
		<span class="col-md-5"><img src="<?php bloginfo('template_directory'); ?>/images/bubble-yellow-box-left.png" id="imgYellowBox" alt="" /></span>
		<div class="col-md-5">
			<!-- Yellow box widget -->
			<?php if ( dynamic_sidebar('homepage-yellow-box-txt') ) : else : endif; ?>
		</div>
	</div>
	<div class="row" id="yelloBoxBottom"></div>
						
				 
	<!-- Icons and text homepage -->
	<div class="row center-block" id="IconBox">        				            				
		 
		<?php
			$products_args = array('post_type' => 'page', 'posts_per_page' => 4, 'orderby' => 'menu_order', 'post_status' => 'publish',);
			$loop = new WP_Query($products_args);
			if ($loop->have_posts()):
					while ($loop->have_posts()) : $loop->the_post();
		?>		
			<div class="col-md-3 center-block" id="products_box">
				<center>
					<a href="<?php the_permalink(); ?>">
						<?php if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail('medium');
						} ?>
					</a>
				</center>
				
				<h2 class="text-center"><strong><a href="<?php the_permalink(); ?>"><?php the_title();?></a></strong></h2>
				<center><p><?php the_excerpt(); ?></p></center>
			</div>													
		<?php endwhile;
			else:	
				echo "<h3>המוצרים שלנו יפורסמו בקרוב. יש למה לחכות .. </h3>";
			endif;
			wp_reset_postdata();
		?>
		
		 
	</div>
	<!-- End 4 icon box home page -->
				
	<!-- bottom box כתבו עלינו -->
	<div class="row" id="greyBoxBottom"></div>
	<div class="row" id="GreyboxHP">
			<center><h3>כתבו עלינו</h3></center>
									
			<div class="col-md-12">
				
			<!-- חץ שמאלי סליידר -->
			<div class="Arrows-HP-Slider">
				<div href="#" class="gallery__controls-prev">
					<img src="<?php bloginfo('template_directory'); ?>/images/prev.png" class="HP_Slider_Rows" alt="" />
				</div>
			</div>
			
				<!-- סליידר כתבו עלינו - פוסטים אחרונים -->
			    <div class="gallery-wrap"> 
					<div class="gallery clearfix">
					
					
						<!--- *** --> <!-- כתבו עלינו  - קטגוריה 5 -->
						<?php query_posts('cat=5'); while ( have_posts() ) : the_post(); ?>
										
							<div class="gallery__item">
							    <a href="<?php the_permalink(); ?>" class="gallery__link">			
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail(thumbnail);
									} ?>
									<!-- <img src="images/image1.jpg" class="gallery__img" alt="" /> -->
								</a>
							</div>
					
					
						<?php endwhile; // end of the loop. ?>	
						<!-- *** -->
								
					</div> <!-- .gallery -->
								
			    </div> <!-- .gallery-wrap --> 
				
				<!-- חץ ימני סליידר -->
				<div class="Arrows-HP-Slider">
					<div href="#" class="gallery__controls-next">
						<img src="<?php bloginfo('template_directory'); ?>/images/next.png" class="HP_Slider_Rows" alt="" />
					</div>
				</div> 
			
			</div><!-- col-md-10 -->					
			
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script type="text/javascript">
				// Only run everything once the page has completely loaded
				$(window).load(function(){

					// Set general variables
					// ====================================================================
					var totalWidth = 0;

					// Total width is calculated by looping through each gallery item and
					// adding up each width and storing that in `totalWidth`
					$(".gallery__item").each(function(){
						totalWidth = totalWidth + $(this).outerWidth(true);
					});

					// The maxScrollPosition is the furthest point the items should
					// ever scroll to. We always want the viewport to be full of images.
					var maxScrollPosition = totalWidth - $(".gallery-wrap").outerWidth();

					// This is the core function that animates to the target item
					// ====================================================================
					function toGalleryItem($targetItem){
						// Make sure the target item exists, otherwise do nothing
						if($targetItem.length){

							// The new position is just to the left of the targetItem
							var newPosition = $targetItem.position().left;

							// If the new position isn't greater than the maximum width
							if(newPosition <= maxScrollPosition){

								// Add active class to the target item
								$targetItem.addClass("gallery__item--active");

								// Remove the Active class from all other items
								$targetItem.siblings().removeClass("gallery__item--active");

								// Animate .gallery element to the correct left position.
								$(".gallery").animate({
									left : - newPosition
								});
							} else {
								// Animate .gallery element to the correct left position.
								$(".gallery").animate({
									left : - maxScrollPosition
								});
							};
						};
					};

					// Basic HTML manipulation
					// ====================================================================
					// Set the gallery width to the totalWidth. This allows all items to
					// be on one line.
					$(".gallery").width(totalWidth);

					// Add active class to the first gallery item
					$(".gallery__item:first").addClass("gallery__item--active");

					// When the prev button is clicked
					// ====================================================================
					$(".gallery__controls-prev").click(function(){
						// Set target item to the item before the active item
						var $targetItem = $(".gallery__item--active").prev();
						toGalleryItem($targetItem);
					});

					// When the next button is clicked
					// ====================================================================
					$(".gallery__controls-next").click(function(){
						// Set target item to the item after the active item
						var $targetItem = $(".gallery__item--active").next();
						toGalleryItem($targetItem);
					});
				});
			</script>

			<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.1.js"></script>
			<script type="text/javascript">
				// Fancybox specific
				// To make images pretty. Not important
				$(document).ready(function(){
					$(".gallery__link").fancybox({
						'titleShow'     : false,
						'transitionIn'  : 'elastic',
						'transitionOut' : 'elastic'
					});
				});
			</script>
			<!-- ************* סוף סליידר כתבו עלינו **************** -->
					
	</div>
				
<?php get_footer(); ?>
