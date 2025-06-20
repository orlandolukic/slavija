<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class SlavijaTheme {

    public static function __initiate() {
        
        // Require all necessary files
        require get_template_directory() . "/inc/helper-functions.php";

        // Add hooks
        add_action("slavija_after_header", "SlavijaTheme::after_header");
        add_action("wp_enqueue_scripts", "SlavijaTheme::enqueue_scripts", 5);
        add_action("wp_head", "SlavijaTheme::wp_head");
        add_action("wp_head", "SlavijaTheme::initiate_keywords", 0);
        add_action("wp_head", "SlavijaTheme::google_analytics");
        add_action("wp_footer", "SlavijaTheme::schema_org");
        add_action( 'wpforms_process', 'SlavijaTheme::wpf_dev_process', 10, 3 );

    }

    public static function after_header() {
        require get_template_directory() . "/inc/html/s-header.php";
    }

    public static function wp_head() {
        $locale = get_locale();
        $local_code = get_language_code($locale);
        $postID = get_contact_us_page_id($locale);
        ?>
        <script type="text/javascript">            
            let apply_for_contact_link = "<?= get_permalink($postID) ?>";
        </script>
        <?php
    }

    public static function enqueue_scripts() {

        wp_enqueue_script('core-linked-list', get_template_directory_uri() . "/js/linked-list.js");
        wp_enqueue_script('slavija', get_template_directory_uri() . "/js/slavija.js", ['jquery'], "1.0.6");

        wp_enqueue_style("slavija-theme", get_template_directory_uri() . "/style.css", [], "1.0.10");
        wp_enqueue_style("bootstrap-grid", get_template_directory_uri() . "/styles/bootstrap-grid.min.css");
        wp_enqueue_style("fontawesome", get_template_directory_uri() . "/styles/fa-all.min.css");
    }

    public static function google_analytics() {
        ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3B9MQ53ZKY"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3B9MQ53ZKY');
        </script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NJBC2NZ');</script>
        <!-- End Google Tag Manager -->
        <?php
    }

    public static function initiate_keywords() {
        $keywords = SlavijaTheme::get_keywords();
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?= $keywords ?>">
        <meta name="robots" content="index, follow">
        <?php
    }

    private static function get_keywords() {

        // TODO: Add support for other languages

        global $post;
        $kw = "";
        switch( $post->ID ) {
        // Homepage
        case 7:         // SR
        case 7688:      // RU
        // O nama
        case 64:        // SR
        case 7703:      // RU
        // Usluge, paket usluga
        case 70:        // SR
        case 7707:      // RU
        default:
            $kw = __("slavija knjigovodstvo, slavija, knjigovodja, knjigovođa, knjigovodstvo, racunovodstvo, računovodstvo, e fakture, e-fakture, zavrsni racun, završni račun, zavrsni racun izrada, završni račun izrada, poresko savetovanje, obračun zarada, obracun zarada, poreske prijave, finansijski izveštaji, finansijski izvestaji, otvaranje firme", "slavija");
            break;

        // Ovlasceni racunovodja
        case 5575:      // SR
        case 7705:      // RU
            $kw = __("knjigovodstvo, ovlasceni racunovodja, ovlašćeni računovođa, ovlasceni racunovodja beograd, ovlašćeni računovođa beograd, racunovodstvo, računovodstvo, e fakture, e-fakture", "slavija");
            break;

        // On-line racunovodstvo
        case 93:        // SR
        case 7709:      // RU
            $kw = __("knjigovodstvo, racunovodstvo online, online racunovodstvo, računovodstvo online, online računovodstvo, online vodjenje knjiga, online knjigovodstvo, online knjigovodstvo beograd, e fakture", "slavija");
            break;

        // Izrada zavrsnog racuna
        case 97:        // SR
        case 7711:      // RU
            $kw = __("knjigovodstvo, izrada zavrsnog racuna, izrada zavrsnog racuna beograd, izrada završnog računa, izrada završnog računa beograd, zavrsni racun iskustvo, završni račun iskustvo", "slavija");
            break;

        // Poresko i poslovno savetovanje
        case 91:        // SR
        case 7713:      // RU
            $kw = __("poresko savetovanje, poresko savetovanje beograd, poslovno savetovanje, poslovno savetovanje beograd, knjigovodstvo konsultacije, knjigovodstvo iskustvo", "slavija");
            break;
        }

        return $kw;
    }

    public static function schema_org() {
        $locale = get_locale();
        $url = home_url();
        switch($locale) {
            case "sr_RS":
                break;
            case "en_US":
            default:
                $url .= "/en/";
                break;
        }
        ?>
        <script type="application/ld+json">
        { "@context" : "https://schema.org",
            "@type" : "Organization",
            "url" : "<?= $url ?>",
            "email": "mailto:office@slavijadoo.co.rs",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "<?= __("Zemun", "slavija") ?>",
                "addressRegion": "<?= __("Srbija", "slavija") ?>",
                "postalCode": "11080",
                "streetAddress": "Prvomajska 108a"
            },
            "contactPoint" : [
                { "@type" : "ContactPoint",
                    "telephone" : "<?= __("011 316 00 81", "slavija") ?>",
                    "contactType" : "<?= __("Kancelarija", "slavija") ?>"
                },
                { "@type" : "ContactPoint",
                    "telephone" : "<?= __("+381 65 316 35 96", "slavija") ?>",
                    "contactType" : "<?= __("Dragan Orlandic", "slavija") ?>"
                },
            ],
            "founder": {
                "@context": "https://schema.org",
                "@type": "Person",
                "email": "mailto:dorlandic@slavijadoo.co.rs",
                "name": "Dragan Orlandic",
                "telephone": "+381 65 316 35 96"
            },
            "taxID": "100096719"
        }
        </script>
        <?php
    }

    /**
     * Action that fires during form entry processing after initial field validation.
     *
     * @link   https://wpforms.com/developers/wpforms_process/
     *
     * @param  array  $fields    Sanitized entry field. values/properties.
     * @param  array  $entry     Original $_POST global.
     * @param  array  $form_data Form data and settings.
     */    
    public static function wpf_dev_process( $fields, $entry, $form_data ) {              
        $sec_check_value = $fields[9][ 'value' ];
        if ( $sec_check_value !== "9" )  {
            wpforms()->process->errors[ $form_data[ 'id' ] ] [ '9' ] = esc_html__( 'Dogodila se greška', 'slavija' );
        }        
    }

}

// Initiate all actions for this theme.
SlavijaTheme::__initiate();