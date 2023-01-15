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
        $id=4531;
        $post = get_post($id);
        $content = apply_filters('the_content', $post->post_content);
        echo $content;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php

// Print footer section.
do_action("slavija_before_footer");

wp_footer();
?>

</html>