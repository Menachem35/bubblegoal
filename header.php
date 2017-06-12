<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	
	<!-- **************** -->
	
	<?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
	
  </head>

  <body>

		<div class="container-fluid">
			<div class="row">
				<nav class="navbar navbar-inverse navbar-fixed-top" id="BubbleNavBar">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="http://www.bubblegoal.co.il"><img src="<?php header_image(); ?>" id="LogoImg" alt="BubbleGoal" /></a>
						</div>	
							<?php wp_nav_menu( array( 
								'theme_location' 	  => 'primary',
								'container' 		    => 'div',
								'container_class' 	=> 'navbar-collapse collapse',
								'container_id'    	=> 'navbar',
								'menu_class'      	=> 'nav navbar-nav',
								'menu_id'         	=> '',
								'echo'            	=> true,
								'fallback_cb'     	=> 'wp_page_menu',
								'before'          	=> '',
								'after'           	=> '',
								'link_before'     	=> '',
								'link_after'      	=> '',
								'items_wrap'      	=> '<ul id="BubbleNav" class="nav navbar-nav navbar-right">%3$s</ul>',
								'depth'           	=> 0,
								'walker'          	=> ''
							)); ?>
																			
					</div>					
				</nav>
			</div>
			<div id="NavBarBoxBottom"></div>
			
