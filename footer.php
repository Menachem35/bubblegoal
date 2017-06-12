       
		<div class="row" id="footerBox">
						
			<nav class="navbar navbar-inverse navbar-static-bottom" id="FooterNav">
				<div class="container-fluid">
					<div class="navbar-header"> 
						
						
						<div id="FooterSocialButtons">	
							<a href=" https://instagram.com/originalbubblegoal" target="_blank">
								<img src="<?php bloginfo('template_directory'); ?>/images/Instagram-Icon.png" alt="Instagram" />
							</a>
							<a href="https://www.pinterest.com/bubblegoal" target="_blank">
								<img src="<?php bloginfo('template_directory'); ?>/images/Pinterest-icon.png" alt="Pinterest" />
							</a>
							<a href="https://www.facebook.com/pages/BubbleGoal-%D7%91%D7%90%D7%91%D7%9C%D7%92%D7%95%D7%9C/641443792655340" target="_blank">
								<img src="<?php bloginfo('template_directory'); ?>/images/facebook-icon.png" alt="Facebook" />
							</a>
							<a href="https://www.youtube.com/channel/UCcH4mr5GHCi4YGckKsg6-7g/feed" target="_blank">
								<img src="<?php bloginfo('template_directory'); ?>/images/YouTube-icon.png" alt="YouTube" />	
							</a>
						</div> 
							
					</div>
						
						
					<?php wp_nav_menu( array( 
								'theme_location' 	  => 'extra-menu',
								'container' 		    => 'div',
								'container_class' 	=> 'navbar-collapse collapse',
								'container_id'    	=> 'footerNav',
								'menu_class'      	=> 'nav navbar-nav',
								'menu_id'         	=> '',
								'echo'            	=> true,
								'fallback_cb'     	=> 'wp_page_menu',
								'before'          	=> '',
								'after'           	=> '',
								'link_before'     	=> '',
								'link_after'      	=> '',
								'items_wrap'      	=> '<ul class="nav navbar-nav navbar-right" id="BubbleNavFooter">%3$s</ul>',
								'depth'           	=> 0,
								'walker'          	=> ''
					)); ?>
							
					
				</div>
				
				
			</nav>	

			<div class="col-md-3"> 
				<p class="footerTxt"> &#169; כל הזכויות שמורות באבלגול 2014 </p>
			</div>
			
			<div class="col-md-3">
			</div>
			
			<div class="col-md-3">
			</div>
			
			<div class="col-md-3">
				<p class="footerTxt">בניית אתר: <a href="http://wguide.co.il/more/website.aspx" id="footerLink" target="_blank">מנחם גליק</a></p>
			</div>
									
		</div>				
		
		
	</div><!-- /container -->

	<?php wp_footer(); ?>
    
  
  </body>
</html>
