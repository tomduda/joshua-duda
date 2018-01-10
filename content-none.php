<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package joshua
 */
?>

<section class="<?php if (is_404()){
    echo 'error-404'; } else { echo 'no-results'; } ?> not-found">
    <div class="index-box">
	   <header class="entry-header">
		    <h1 class="entry-title">
                <?php
                    if ( is_404() ) { 
                        _e( 'Page not available', 'joshua' );
                    }else if ( is_search() ) {
                    	printf( __( 'Nothing found for %s', 'joshua'), '<em>' . get_search_query() . '</em>' );
                    }else {
                    	_e( 'Nothing Found', 'joshua' );
                    }
                ?>
            </h1>
	   </header><!-- .page-header -->

	<div class="entry-content">
        <h1>This is content-none.php</h1>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'joshua' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
        <?php elseif ( is_404() ) : ?>
            <p><?php _e( 'The page you are looking for is not here. Why not try some of my blog posts below or click on the search item in the menu', 'joshua' ); ?></p>
                <?php get_search_form(); ?>
        <?php elseif ( is_search() ) : ?>
            <p><?php _e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'joshua' ); ?></p>
			<?php get_search_form(); ?>
        <?php else : ?>
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'joshua' ); ?></p>
			<?php get_search_form(); ?>
        <?php endif; ?>
	</div><!-- .entry-content -->
    </div><!-- .index-box -->
    <?php
    if ( is_404() || is_search() ) { ?>
        <header class="page-header">
            <h1 class="page-title"><?php _e( 'Most recent posts:', 'joshua' ); ?></h1>
        </header>
    <?php
        // Get the 6 latest posts
        $args = array(
            'posts_per_page' => 6
        );
        $latest_posts_query = new WP_Query( $args );
        // The Loop
        if ( $latest_posts_query->have_posts() ) {
            while ( $latest_posts_query->have_posts() ) {
                $latest_posts_query->the_post();
                // Get the standard index page content
                get_template_part( 'content', get_post_format() );
            }
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    }
    ?>

</section><!-- .no-results -->
