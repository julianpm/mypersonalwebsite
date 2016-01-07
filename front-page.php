<?php get_header() ?>
	    
		<?php // Start Flexible Content
		if( have_rows('flex_content') ) : ?>
			<?php while ( have_rows('flex_content') ) : the_row();

			// Layout Name: Flex Content Hero + About
			if( get_row_layout() == 'flex_content_hero' ): ?>
			
				<section class="hero flex">
					
					<header class="nameAndTitle flex">
						<h1><?php the_sub_field('flex_content_hero_name'); ?></h1>
						<h2><?php the_sub_field('flex_content_hero_title'); ?></h2>
					</header> <!-- END OF NAMEANDTITLE -->

					<nav class="theHeader flex">          
						<ul class="mainMenu flex">					          
							<?php wp_nav_menu( array( "theme_location" => "primary", "container" => '', 'items_wrap'=> '%3$s' ) ); ?>    
						</ul><!-- /.mainMenu -->
					</nav><!-- /.header -->

					<div class="about flex" id="about">
						<?php if ( get_sub_field('flex_content_about_about') ) : ?>
							<h3><?php the_sub_field('flex_content_about_about') ?></h3>
						<?php endif; ?>

					<div class="bio">
						<?php the_sub_field('flex_content_about_bio'); ?>
					</div> <!-- END OF BIO -->	

					<?php $image = get_sub_field('flex_content_about_headshot');
						if( !empty($image) ): ?>
							<img class="headShot" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

					<div class="bullet">
						<?php the_sub_field('flex_content_about_divider') ?>
					</div> <!-- END OF BULLET -->
					
					<div class="quote">
						<?php the_sub_field('flex_content_about_quote') ?>
					</div> <!-- END OF QUOTE -->	

				</section> <!-- END OF HERO -->

			
			<?php // Layout name: Contact 
				elseif (get_row_layout() == 'flex_content_contact'): ?>	

				<section class="contact" id="contact">
					
					<p class="contactLabel"><?php the_sub_field('flex_content_contact_email') ?></p>
					
					<div class="socialIcons flex wow slideInLeft">	
							<?php if ( get_sub_field('flex_content_contact_twitter') ) : ?>
								<a class="indivIcon" href="<?php the_sub_field('flex_content_contact_twitter'); ?>">
									<i class="fa fa-twitter"></i>
								</a>
							<?php endif; ?>
							
							<?php if ( get_sub_field('flex_content_contact_linkedin') ) : ?>
								<a class="indivIcon" href="<?php the_sub_field('flex_content_contact_linkedin'); ?>">
									<i class="fa fa-linkedin"></i>
								</a>
							<?php endif; ?>
							
							<?php if ( get_sub_field('flex_content_contact_github') ) : ?>
								<a class="indivIcon" href="<?php the_sub_field('flex_content_contact_github'); ?>">
									<i class="fa fa-github"></i>
								</a>
							<?php endif; ?>
					</div> <!-- END OF SOCIALICONS -->

				</section> <!-- END OF CONTACT -->

			
			<?php // Layout name: Portfolio
				elseif (get_row_layout() == 'flex_content_portfolio'): ?>

					<?php if ( get_sub_field('flex_content_portfolio_title') ) : ?>
						<h3 class="container"><?php the_sub_field ('flex_content_portfolio_title') ; ?></h3>
					<?php endif; ?>

			<?php $portfolioPieces = new WP_Query(
					array(
						'posts_per_page' => -1,
						'post_type' => 'portfolio',
						'order' => 'ASC'
						)
				); ?>

			<?php if ( $portfolioPieces->have_posts() ) : ?>

				<?php while ($portfolioPieces->have_posts()) : $portfolioPieces->the_post(); ?>

				<section class='portfolio container flex' id="<?php echo $post->post_name; ?>">
								
					<div class="portfolioImages">
						<?php $image = get_field('portfolio_screenshots');
							if( !empty($image) ): ?>
								<img src="<?php echo $image['sizes']['portfolioPic']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
					</div> <!-- END OF PORTFOLIOIMAGES -->

					<div class="portfolioInfo flex">
						<h5><?php the_title(); ?></h5>
					</div> <!-- END OF PORTFOLIOINFO -->
					
					<div class="portfolioTools">		
						<?php

							// check if the repeater field has rows of data
							if( have_rows('tools') ):

							 	// loop through the rows of data
							    while ( have_rows('tools') ) : the_row();

						       // display a sub field value
						       ?> 
							        <p><?php  the_sub_field('tool'); ?></p>
								<?php
							    endwhile;

							else :

							    // no rows found

							endif;

						?>
					</div> <!-- END OF PORTFOLIOTOOLS -->

					<div class="portfolioDescription">		
							<?php the_field('project_description') ?>
					</div> <!-- END OF PORTFOLIODESCRIPTION -->
	
					<a class="visitPage" href="<?php the_field('live_link') ?>"><?php the_field('project_link') ?></a>
						
				</section> <!-- END OF PORTFOLIO -->

			<?php endwhile; //END PORTFOLIO LOOP?>
		<?php wp_reset_postdata(); ?>
		<?php else:  ?>				
		<?php endif; //END PORTFOLIO LOOP?>

	<?php endif; //END FLEXIBLE CONTENT?>
	<?php endwhile; //END FLEXIBLE CONTENT?>
	<?php endif; //END FLEXIBLE CONTENT?>

<?php get_footer(); ?>
