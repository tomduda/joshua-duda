<?php

/*
Single Post Template: [single post]
Description: This part is optional, but helpful for describing the Post Template
*/



get_header('blog'); ?>
<h1>This is blog-page.php</h1>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<h1>This is blog-page.php</h1>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
