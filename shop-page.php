<?php
/*Template Name: Shop Page*/
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
<?php dynamic_sidebar('sidebar-carousel')?>
</main>

<aside>
<?php dynamic_sidebar('sidebar-shop');?>
</aside><!-- #secondary -->
<?php
get_footer();