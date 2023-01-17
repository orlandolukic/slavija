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
                <div class="text-strong">
                    <i class="fas fa-star"></i>
                    <?= __("Sa Vama već 30+ godina", "slavija") ?>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu-container">
    <div class="container">
       <div class="row">
           <div class="col-2 col-xs-6 col-xs-6 logo-place">
               <a href="https://slavijadoo.co.rs/">
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

               <div class="button medium text-strong apply-for-contact">
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
        <div class="mobile-menu-close">
            <i class="fas fa-times fa-2x"></i>
        </div>
    </div>
</div>
