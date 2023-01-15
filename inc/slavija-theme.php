<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class SlavijaTheme {

    public static function __initiate() {
        add_action("slavija_after_header", "SlavijaTheme::after_header");
        add_action("wp_enqueue_scripts", "SlavijaTheme::enqueue_scripts", 5);
        add_action("wp_head", "SlavijaTheme::initiate_keywords", 0);
        add_action("wp_footer", "SlavijaTheme::schema_org");
    }

    public static function after_header() {
        require get_template_directory() . "/inc/html/s-header.php";
    }

    public static function enqueue_scripts() {

        wp_enqueue_script('core-linked-list', get_template_directory_uri() . "/js/linked-list.js");
        wp_enqueue_script('slavija', get_template_directory_uri() . "/js/slavija.js", ['jquery'], "1.0.1");

        wp_enqueue_style("slavija-theme", get_template_directory_uri() . "/style.css", [], "1.0.2");
        wp_enqueue_style("bootstrap-grid", get_template_directory_uri() . "/styles/bootstrap-grid.min.css");
        wp_enqueue_style("fontawesome", get_template_directory_uri() . "/styles/fa-all.min.css");
    }

    public static function initiate_keywords() {
        global $post;
        $keywords = __("knjigovodja, knjigovođa, knjigovodstvo, racunovodstvo, računovodstvo, e fakture, e-fakture, zavrsni racun, završni račun, zavrsni racun izrada, završni račun izrada, poresko savetovanje, obračun zarada, obracun zarada, poreske prijave, finansijski izveštaji, finansijski izvestaji, otvaranje firme", "slavija");
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?= $keywords ?>">
        <?php
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
                { "@type" : "ContactPoint",
                    "telephone" : "<?= __("+381 62 965 62 95", "slavija") ?>",
                    "contactType" : "<?= __("Ognjan Arlov", "slavija") ?>"
                }
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

}

// Initiate all actions for this theme.
SlavijaTheme::__initiate();