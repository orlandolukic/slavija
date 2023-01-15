<?php

if ( !defined("ABSPATH") )
    exit();

class Elementor_Slavija_Footer_Menu_Plugin extends \Elementor\Widget_Base {

    public function get_name() {
        return "slavija-footer-menu-plugin";
    }

    public function get_title() {
        return "Slavija Footer Menu";
    }

    public function get_icon() {
        return "fas fa-home";
    }

    public function get_categories() {
        return [ 'slavija' ];
    }

    public function get_script_depends() {
        return [];
    }

    public function get_style_depends() {
        return [];
    }

    protected function _register_controls() {

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="footer-menu-placeholder">
            <?php
            wp_nav_menu( array(
                'menu'              => "FooterMenu", // Menu ID, slug, name, or object.
                'menu_class'        => "footer-menu", // Menu class.
                'container'         => false,
                'container_class'   => "", // 'menu-{menu slug}-container'
                'container_id'      => "",
                'fallback_cb'       => false, // Default is 'wp_page_menu'. 'false' for no fallback.
                'before'            => "",
                'after'             => "",
                'link_before'       => "", // before link.
                'link_after'        => "", // after link.
                'echo'              => true, // Default true.
                'depth'             => 0, // (int) Default 0. dropdown menu use
                'items_wrap'        => '<div class="%2$s">%3$s</div>',
                'walker'            => new Slavija_Footer_Navigation_Walker(),// custom walker class.
                'theme_location'    => "footer", // register_nav_menu().
            ) );
            ?>
        </div>
        <?php
    }

}