
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

				

				<div class="divider"></div>
				

				
				
					
			<?php elseif (get_row_layout() == 'flex_content_portfolio'): ?>
		
				<section class="portfolio">

					<div class="portfolioLabel">
						<h3><?php the_sub_field('flex_content_portfolio_title'); ?></h3>
					</div> <!-- END OF PORTFOLIOLABEL -->


				</section> <!-- END OF PORTFOLIO -->



				<div class="divider"></div>

				

			<?php elseif (get_row_layout() == 'flex_content_about'): ?>
				
				<section class="about flex">

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

					<div class="bullet">
						<?php the_sub_field('flex_content_about_divider') ?>
					</div> <!-- END OF BULLET -->
					
					<div class="quote">
						<?php the_sub_field('flex_content_about_quote') ?>
					</div> <!-- END OF QUOTE -->	

				</section> <!-- END OF ABOUT -->

				

				<div class="divider"></div>



			<?php elseif (get_row_layout() == 'flex_content_contact'): ?>	

				<section class="contact">
					
					<div class="contactLabel">
						<h3><?php the_sub_field('flex_content_contact_label') ?></h3>
					</div> <!-- END OF LABEL -->					

				</section> <!-- END OF CONTACT -->







			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

	</div> <!-- END OF CONTAINER -->
</div> <!-- END OF MAIN -->



<?php get_footer(); ?>