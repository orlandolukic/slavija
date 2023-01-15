<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Testimonials_Widget {

    public static function initiate() {
        add_action( 'elementor/widgets/widgets_registered', array( 'Testimonials_Widget', 'register_widget' ) );
        add_action( 'wp_enqueue_scripts', array( 'Testimonials_Widget', 'enqueue_scripts' ) );
    }

    public static function register_widget( $widgets_manager  ) {
        require __DIR__ . "/elementor-testimonials-plugin.php";

        $widgets_manager->register_widget_type( new Elementor_Testimonials_Plugin() );
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( 'testimonials-plugin', get_template_directory_uri() . "/inc/elementor/testimonials/style.css", [], "1.0.0" );
        wp_enqueue_script('testimonials-plugin-helpers', get_template_directory_uri() . "/inc/elementor/testimonials/elementor-testimonials-plugin-helpers.js", ['jquery'], '1.0.0', false);
        wp_enqueue_script('testimonials-plugin-factory', get_template_directory_uri() . "/inc/elementor/testimonials/factory.js", ['jquery'], '1.0.0', false);
    }

}

// Initiate widget!
Testimonials_Widget::initiate();