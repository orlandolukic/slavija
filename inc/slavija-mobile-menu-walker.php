<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Slavija_Mobile_Menu_Walker extends Walker_Nav_Menu
{

    public static function initiate() {
        add_action('wp_enqueue_scripts', array('Slavija_Mobile_Menu_Walker', 'enqueue_scripts'));
    }

    public static function enqueue_scripts() {
        wp_enqueue_script( 'mobile-menu-operations', get_template_directory_uri() . "/js/mobile-menu.js", false );
    }

    // =========================================================================================================
    //      Non-static data
    // =========================================================================================================

    private $level;

    public function __construct() {
        $this->level = 0;
    }

    public function start_lvl( &$output, $depth = 0, $args = null )
    {

        // Default class.
        $classes = array( 'sub-menu' );

        /**
         * Filters the CSS class(es) applied to a menu list element.
         *
         * @since 4.8.0
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' sdsdsd"' : '';

        if ( $depth+1 > 0 ) {
            $output .= '<div class="caret-expansion"><i class="fa fa-caret-down fa-2x"></i></div>';
        }

        $output .= "<div$class_names>";
        $output .= "<ul>";        
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "</ul>";
        $output .= "</div>";
    }
}

// Initiate all necessary scripts
Slavija_Mobile_Menu_Walker::initiate();