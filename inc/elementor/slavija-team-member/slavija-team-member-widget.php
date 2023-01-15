<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Slavija_Team_Member_Widget {

    public static function initiate() {

        add_action( 'elementor/widgets/widgets_registered', array( 'Slavija_Team_Member_Widget', 'register_widget' ) );
        add_action( 'wp_enqueue_scripts', array( 'Slavija_Team_Member_Widget', 'enqueue_scripts' ) );
    }

    public static function register_widget() {
        require __DIR__ . "/elementor-slavija-team-member-plugin.php";

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Slavija_Team_Member_Plugin() );
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( 'slavija-team-member-style', get_template_directory_uri() . "/inc/elementor/slavija-team-member/style.css", [], "1.0.0");
    }

}

// Initiate widget!
Slavija_Team_Member_Widget::initiate();