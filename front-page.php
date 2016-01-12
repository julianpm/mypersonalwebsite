<?php get_header() ?>
	    
		<?php // Start Flexible Content
		if( have_rows('flex_content') ) : ?>
			<?php while ( have_rows('flex_content') ) : the_row();

			// Layout Name: Flex Content Hero + About
			if( get_row_layout() == 'flex_content_hero' ): ?>

				<section class="hero flex container">
					
					<header class="nameAndTitle">
						<h1><?php the_sub_field('flex_content_hero_name'); ?></h1>
						<h2><?php the_sub_field('flex_content_hero_title'); ?></h2>
						<?php the_sub_field('flex_content_hero_bio'); ?>
					</header> <!-- END OF NAMEANDTITLE -->

					<?php $image = get_sub_field('flex_content_hero_headshot');
						if( !empty($image) ): ?>
							<img class="headShot" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</section> <!-- END OF HERO -->

			
			<?php // Layout name: Contact 
				elseif (get_row_layout() == 'flex_content_contact'): ?>	

				<section class="contact" id="contact">
					
					<p class="contactLabel"><?php the_sub_field('flex_content_contact_email') ?></p>
					
					<div class="socialIcons wow zoomIn flex">	
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


				<div class="border"></div>

			
			<?php // Layout name: Portfolio
				elseif (get_row_layout() == 'flex_content_portfolio'): ?>

					<?php if ( get_sub_field('flex_content_portfolio_title') ) : ?>
						<h3 class="portfolioHeader container"><?php the_sub_field ('flex_content_portfolio_title') ; ?></h3>
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
								
					<?php the_post_thumbnail( 'portfolioPic', array('class' => 'portfolioImage')); ?>

					<div class="portfolioInfo flex">
						<h4 class="portfolioTitle"><?php the_title(); ?></h4>
						<?php the_content(); ?>
						<a class="visitPage" href="<?php the_field('live_link') ?>"><?php the_field('project_link') ?></a>
					</div> <!-- END OF PORTFOLIOINFO -->
						
				</section> <!-- END OF PORTFOLIO -->

			<?php endwhile; //END PORTFOLIO LOOP?>
		<?php wp_reset_postdata(); ?>
		<?php else:  ?>				
		<?php endif; //END PORTFOLIO LOOP?>

	<?php endif; //END FLEXIBLE CONTENT?>
	<?php endwhile; //END FLEXIBLE CONTENT?>
	<?php endif; //END FLEXIBLE CONTENT?>

<?php get_footer(); ?>
