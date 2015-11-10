
<div class="main">
	<div class="container">
	    
		<?php // Start Flexible Content
		if( have_rows('flex_content') ) : ?>
			<?php while ( have_rows('flex_content') ) : the_row();

			// Layout Name: layout_name
			if( get_row_layout() == 'flex_content_hero' ): ?>
			
				<section class="mainPage flex">

					<div class="nameAndTitle flex">
						<h1><?php the_sub_field('flex_content_hero_name'); ?></h1>
						<h2><?php the_sub_field('flex_content_hero_title'); ?></h2>
					</div> <!-- END OF NAMEANDTITLE -->

					<div class="vertDiv flex">
						<div class="vertDivider"></div>
					</div> <!-- END OF VERTDIV -->
								
					<div class="theHeader flex">
						<?php get_header(); ?>
					</div> <!-- END OF THEHEADER -->

				</section> <!-- END OF MAINPAGE -->



				
				






				<div class="portfolioHeader" id="portfolio">
					<h3>Portfolio</h3>
				</div>
					<?php

					$portfolioPieces = new WP_Query(
						array(
							'posts_per_page' => -1,
							'post_type' => 'portfolio',
							'order' => 'ASC'
							)
					); ?>

					<?php if ( $portfolioPieces->have_posts() ) : ?>

						<?php while ($portfolioPieces->have_posts()) : $portfolioPieces->the_post(); ?>

				<section class='portfolio flex' id="<?php echo $post->post_name; ?>">
								
					<div class="portfolioImages">
							<div class="image">
								<?php $image = get_field('portfolio_screenshots'); ?>
								<img src="<?php echo $image['sizes']['portfolioPic'] ?>">
							</div>
					</div> <!-- END OF PORTFOLIOIMAGES -->

					<div class="portfolioInfo flex">	

						<h5><?php the_title(); ?></h5>

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

					</div> <!-- END OF PORTFOLIOINFO -->
						
				</section> <!-- END OF PORTFOLIO -->

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					<?php else:  ?>
						
					<?php endif; ?>



				



				<div class="divider"></div>






				

			<?php elseif (get_row_layout() == 'flex_content_about'): ?>
				
				<section class="about flex" id="about">

					<h3><?php the_sub_field('flex_content_about_about') ?></h3>

					<div class="bio">
						<?php the_sub_field('flex_content_about_bio'); ?>
					</div> <!-- END OF BIO -->	

					<div class="headShot">
						<?php 

						$image = get_sub_field('flex_content_about_headshot');

						if( !empty($image) ): ?>

							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

						<?php endif; ?>
					</div> <!-- END OF HEADSHOT -->

					<div class="headshotCredit">
						<?php the_sub_field('flex_content_about_credit') ?>
					</div> <!-- END OF HEADSHOTCREDIT -->

					<div class="bullet">
						<?php the_sub_field('flex_content_about_divider') ?>
					</div> <!-- END OF BULLET -->
					
					<div class="quote">
						<?php the_sub_field('flex_content_about_quote') ?>
					</div> <!-- END OF QUOTE -->	

				</section> <!-- END OF ABOUT -->

			</div> <!-- END OF CONTAINER -->
		</div> <!-- END OF MAIN -->


			







			<?php elseif (get_row_layout() == 'flex_content_contact'): ?>	

				<section class="contact" id="contact">
					
					<div class="contactLabel">
						<p><?php the_sub_field('flex_content_contact_email') ?></p>
					</div> <!-- END OF LABEL -->

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

					<?php get_footer(); ?>

				</section> <!-- END OF CONTACT -->

			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
