<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Slavija_Footer_Navigation_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $output .= "<a href='" . $item->url . "'>";
            $output .= "<div class=\"menu-item\">";
            $output .= "<div class=\"left-bar\"></div>";
                $output .= $item->title;
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
            $output .= "</div>";
        $output.= "</a>";
    }
}