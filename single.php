<?php
get_header();?>
<main>
<?php
// Start the Loop.
while ( have_posts() ) :
	the_post();
	get_template_part( 'partials/content' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endwhile;?>
</main>
<?php
get_footer();
