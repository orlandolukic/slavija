<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Slavija_Menu_Walker extends Walker_Nav_Menu
{
    private $level;

    public function __construct() {
        $this->level = 0;
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        /*
        if ( $depth == 0 ) {
            if ($item->url && $item->url != '#') {
                $output .= '<a href="' . $item->url . '">';
            } else {
                $output .= '<span>';
            }

            $output .= "<div class='" . implode(" ", $item->classes) . "'>";

            $output .= $item->title;
        } else {
            if ($item->url && $item->url != '#') {
                $output .= '<a href="' . $item->url . '">';
                $output .= "<div class='sub-menu-item " . implode(" ", $item->classes) . "'>";
            } else {
                $output .= '<span>';
            }
            $output .= $item->title;
        }*/

        $output .= "<GG></GG>";
        $output .= "<div class=\"menu-item-wrapper" . ( $this->has_children ? " has-children" : "" ) . "\">";

        if ($item->url && $item->url != '#') {
            $item->classes[] = "depth-" . $depth;
            $output .= '<a href="' . $item->url . '">';
                $output .= "<div class='" . implode(" ", $item->classes) . "'>";
                $output .= $item->title;
                $output .= "<div class=\"bottom-bar\"></div>";
                $output .= "</div>";
                if ( $depth > 0 ) {
                    $output .= "<div class=\"left-bar\"></div>";
                }
            $output .= "</a>";
        } else {
            $output .= '<span>';
            $output .= $item->title;
        }
    }

    public function end_el(  &$output, $item, $depth = 0, $args = null)
    {
        if (!$item->url || $item->url == '#') {
            $output .= '</span>';
        };
        $output .= "</div>";
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
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= "<div$class_names new-level>";
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "</div>";
    }
}