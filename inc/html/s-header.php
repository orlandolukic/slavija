<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

?>

<div class="loader-wrapper">
    <div class="loader-placeholder">
        <i class="fa fa-circle-notch fa-spin fa-4x"></i>
    </div>
</div>

<div class="scroll-wrapper not-visible">
    <div class="scroll-placeholder">
        <i class="fas fa-chevron-up"></i>
    </div>
</div>

<?php 

// Create callto link
$locale = get_locale();
if ( $locale == 'sr_RS' ) {
    $callto_link = "tel:+381653163596";
    $home_url_suffix = "";
    $apply_for_contact_button_class = "";
    $callto_icon = "fa fa-phone";
} else if ( $locale == 'ru_RU' ) {
    $callto_link = "https://wa.me/381653163596";
    $home_url_suffix = "ru/";
    $apply_for_contact_button_class = " apply-russia";
    $callto_icon = "fab fa-whatsapp";
} else if ( $locale == 'en_US' ) {
    $callto_link = "https://wa.me/381653163596";
    $home_url_suffix = "en/";   
    $apply_for_contact_button_class = " apply-usa"; 
    $callto_icon = "fab fa-whatsapp";
}

?>

<a href="<?= $callto_link ?>">
    <div class="contact-us-button not-visible display-desktop-none display-laptop-none">
        <i class="<?= $callto_icon ?>"></i>
    </div>
</a>

<div itemscope itemtype="https://schema.org/Organization" class="small-header-top">
    <div class="container">
        <div class="row">
            <div class="col-9 col-xs-12 header-elements">
               <div class="header-element">
                   <i class="far fa-hourglass"></i>
                   <div class="heading"><?= __("Radno vreme:", "slavija") ?></div>
                   <div class="heading-value"><?= __("08h - 16h", "slavija") ?></div>
               </div>

                <div class="header-element">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="heading"><?= __("Adresa:", "slavija") ?></div>
                    <div class="heading-value"><?= __("Prvomajska 108a, Zemun", "slavija") ?></div>
                </div>

                <div class="header-element">
                    <i class="fas fa-phone-alt"></i>
                    <div class="heading"><?= __("Kontakt telefon:", "slavija") ?></div>
                    <div class="heading-value">
                        <?= __("011 / 31 60 081", "slavija") ?>
                    </div>
                </div>
            </div>
            <div class="col-3 col-xs-12 text-right">                
                <div class="language-picker">
                    
                    <?php 
                        $selected_language = get_selected_language($locale);
                    ?>
                    <div class="language-item chosen">
                        <img src="<?= $selected_language["language_image"] ?>" />
                        <div class="lang"><?= $selected_language["language_name"] ?></div>
                    </div>                   
                    
                    <div class="language-list">
                        <?php 
                            $languages = get_languages_list_other_than($locale);
                            $i = 0;
                            foreach ($languages as $key => $value) : 
                                if ( $i > 0 ) : ?>
                                <div class="divider"></div>
                                <?php endif;
                            ?>                            
                            <a href="<?= $value["language_link"] ?>">
                                <div class="language-item">
                                    <img src="<?= $value["language_image"] ?>" />
                                    <div class="lang"><?= $value["language_name"] ?></div>
                                </div>                                
                            </a>
                        <?php 
                            $i++;
                            endforeach; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu-container">
    <div class="container">
       <div class="row">
           <div class="col-2 col-xs-6 col-xs-6 logo-place">
               <a href="https://slavijadoo.co.rs/<?= $home_url_suffix ?>">
                   <img src="<?= get_template_directory_uri() ?>/images/logo.png">
               </a>
           </div>
           <div class="col-7 col-xs-6 display-mobile-none display-tablet-none" style="padding: 0">
               <?php
               wp_nav_menu( array(
                   'menu'              => "MainMenu", // Menu ID, slug, name, or object.
                   'menu_class'        => "main-menu", // Menu class.
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
                   'walker'            => new Slavija_Menu_Walker(),// custom walker class.
                   'theme_location'    => "Primary", // register_nav_menu().
               ) );
               ?>
           </div>
           <div class="col-3 button-place text-right">

               <div class="button medium text-strong apply-for-contact<?= $apply_for_contact_button_class ?>">
                   <div class="regular">
                       <?= __("Zakažite sastanak", "slavija") ?>
                       <i class="fas fa-angle-double-right main-icon"></i>
                   </div>
                   <div class="loading">
                       <i class="fas fa-circle-notch fa-2x fa-spin"></i>
                   </div>
               </div>

           </div>

           <div class="col-10 col-xs-6 mobile-menu-icon">
               <div class="icon">
                   <i class="fas fa-bars fa-2x"></i>
               </div>
           </div>

       </div>
    </div>
</div>

<div class="mobile-menu-placeholder">
    <div class="mobile-menu-overlay"></div>
    <div class="mobile-menu">
        <div class="heading-section">
            <div class="heading"><?= __('MENU', 'slavija') ?></div>
            <div class="subheading"><?= __("Tradicija duga 30+ godina", "slavija") ?></div>
        </div>
        <div class="menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'    => 'mobile_menu',
                    'menu_class'        => 'mobile-menu-list',
                    'link_before'       => "<div class=\"link-inner\"><div class=\"border-bar\"></div>",
                    "link_after"        => "</div>",
                    'depth'             => 0,
                    'walker'            => new Slavija_Mobile_Menu_Walker(),// custom walker class.
                )
            );
            ?>
        </div>
        <div class="mobile-menu-language-picker">
            <div class="title"><?= __('Odaberite jezik', 'slavija') ?></div>
            <div class="language-list">

                <div class="language-item selected">
                    <div class="language-item-flag">
                        <img src="<?= $selected_language["language_image"] ?>" />
                    </div>
                    <div class="language-item-name"><?= $selected_language["language_name"] ?></div>
                    <div class="language-item-check-mark">
                        <i class="far fa-check-circle"></i>
                    </div>
                </div>    
                
                <?php                     
                    $i = 0;
                    foreach ($languages as $key => $value) : ?>                                    

                    <a href="<?= $value["language_link"] ?>">
                        <div class="language-item">
                            <div class="language-item-flag">
                                <img src="<?= $value["language_image"] ?>" />
                            </div>
                            <div class="language-item-name"><?= $value["language_name"] ?></div>                            
                        </div>
                    </a>

                <?php 
                    $i++;
                    endforeach; 
                ?>                
            </div>
            <div class="footer-data">
                <?= __('Slavija d.o.o | 1988 - 2023', 'slavija') ?>
            </div>
        </div>
        <div class="mobile-menu-close">
            <i class="fas fa-times fa-2x"></i>
        </div>
    </div>
</div>
