<?php
/*Template Name: Ceramics Page*/
;?>

<?php
 /*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Go
 */
get_header();

Go\page_title();?>


<main>
    <!--if we have posts.. show them! if not, we do not have posts-->
<?php if(has_post_thumbnail()) : ?>
    <?php the_post_thumbnail();?>
    <?php endif; ?><!--show me thumbnails-->
    <?php while(have_posts()) : the_post() ; ?>

<?php the_content() ;?>
<?php endwhile;?>


</main>


<?php
get_footer();