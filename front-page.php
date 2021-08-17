<?php
/*Template Name: Front Page*/
;?>

<?php
 /*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Go
 */

get_header();

Go\page_title();?>

<img src="https://www.hannaheberts.com/it270/Final/wp-content/uploads/hannah_cermaics_18-scaled.jpg" alt="ceramics" id="homeimg">

<?php
if ( have_posts() ) {

	// Start the Loop.
	while ( have_posts() ) :
		the_post();
		get_template_part( 'partials/content' );
	endwhile;

	// Previous/next page navigation.
	get_template_part( 'partials/pagination' );

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'partials/content', 'none' );
}

get_footer();
