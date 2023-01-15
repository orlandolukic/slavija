<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Slavija_Footer_Menu_Widget {

    public static function initiate() {

        require __DIR__ . "/slavija-footer-navigation-walker.php";

        add_action( 'elementor/widgets/widgets_registered', array( 'Slavija_Footer_Menu_Widget', 'register_widget' ) );
        add_action( 'wp_enqueue_scripts', array( 'Slavija_Footer_Menu_Widget', 'enqueue_scripts' ) );
    }

    public static function register_widget() {
        require __DIR__ . "/elementor-slavija-footer-menu-plugin.php";

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Slavija_Footer_Menu_Plugin() );
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( 'slavija-footer-menu-style', get_template_directory_uri() . "/inc/elementor/slavija-footer-menu/style.css", [], "1.0.0");
    }

}

// Initiate widget!
Slavija_Footer_Menu_Widget::initiate();