<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>
<!DOCTYPE html>

<head>
    <?php wp_head(); ?>
</head>
<body <?php body_class();  ?>>
    <?php
    // Print header section.
    do_action("slavija_after_header");
    ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                the_content();
            }

/*
			// Load posts loop.


			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();
*/

		} else {

		    /*
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );
            */
		}
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php

// Print footer section.
do_action("slavija_before_footer");

wp_footer();
?>

</html>
