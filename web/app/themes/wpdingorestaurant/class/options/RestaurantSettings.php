<?php

namespace jeyofdev\wp\dingo\restaurant\options;



/**
 * Class that manages the restaurant panel in the administration settings
 */
class RestaurantSettings
{
    CONST GROUP = "restaurant_settings";
    CONST SECTION_SLUG = "restaurant_settings_section";

    CONST ADDRESS = "restaurant_address";
    CONST PHONE = "restaurant_phone";
    CONST EMAIL = "restaurant_email";
    CONST FACEBOOK = "restaurant_facebook";
    CONST TWITTER = "restaurant_twitter";
    CONST INSTAGRAM = "restaurant_instagram";
    CONST OPENING_HOURS = "restaurant_opening_hours";



    /**
     * Save a new item to the admin panel
     */
    public static function register () : void
    {
        add_action("admin_menu", [self::class, "addmenu"]);
        add_action("admin_init", [self::class, "registerSettings"]);
    }



    /**
     * Create the form that manages the options
     */
    public static function registerSettings () : void
    {
        register_setting(self::GROUP, self::ADDRESS);
        register_setting(self::GROUP, self::PHONE);
        register_setting(self::GROUP, self::EMAIL);
        register_setting(self::GROUP, self::FACEBOOK);
        register_setting(self::GROUP, self::TWITTER);
        register_setting(self::GROUP, self::INSTAGRAM);
        register_setting(self::GROUP, self::OPENING_HOURS);
        add_settings_section(self::SECTION_SLUG, null, null, self::GROUP);

        add_settings_field("restaurant_options_phone", __("Phone", "dingo"), function () {
            ?>
                <input type="text" name="<?= self::PHONE; ?>" id="<?= self::PHONE; ?>" class="regular-text" value="<?= esc_html(get_option(self::PHONE)); ?>">
                <p class="description" id="phone-description"><?= __("Restaurant phone number (ex: 01 12 34 56 78).", "dingo"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("restaurant_options_address", __("Address", "dingo"), function () {
            ?>
                <input type="text" name="<?= self::ADDRESS; ?>" id="<?= self::ADDRESS; ?>" class="regular-text" value="<?= esc_html(get_option(self::ADDRESS)); ?>">
                <p class="description" id="address-description"><?= __("Restaurant address (ex: 16 Creek Ave. Farming, NY).", "dingo"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("restaurant_options_email", __("Email", "dingo"), function () {
            ?>
                <input type="email" name="<?= self::EMAIL; ?>" id="<?= self::EMAIL; ?>" class="regular-text ltr" value="<?= !empty(get_option(self::EMAIL)) ? esc_html(get_option(self::EMAIL)) : esc_html(get_option('admin_email')); ?>">
                <p class="description" id="email-description"><?= __("Restaurant email (ex: monsite@contact.com). By default the email address is that indicated Settings/General.", "dingo"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("restaurant_options_facebook", __("Facebook", "dingo"), function () {
            ?>
                <input type="text" name="<?= self::FACEBOOK; ?>" id="<?= self::FACEBOOK; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::FACEBOOK)); ?>">
                <p class="description" id="facebook-description"><?= __("Facebook username (ex: john-doe).", "dingo"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("restaurant_options_twitter", __("Twitter", "dingo"), function () {
            ?>
                <input type="text" name="<?= self::TWITTER; ?>" id="<?= self::TWITTER; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::TWITTER)); ?>">
                <p class="description" id="twitter-description"><?= __("Twitter username (ex: john-doe).", "dingo"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("restaurant_options_instagram", __("Instagram", "dingo"), function () {
            ?>
                <input type="text" name="<?= self::INSTAGRAM; ?>" id="<?= self::INSTAGRAM; ?>" class="regular-text ltr" value="<?= esc_html(get_option(self::INSTAGRAM)); ?>">
                <p class="description" id="instagram-description"><?= __("Instagram username (ex: john-doe).", "dingo"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);

        add_settings_field("restaurant_options_opening_hours", __("Opening hours", "dingo"), function () {
            ?>
                <textarea name="<?= self::OPENING_HOURS; ?>" id="<?= self::OPENING_HOURS; ?>" class="regular-text ltr" rows="8"><?= esc_html(get_option(self::OPENING_HOURS)); ?></textarea>
                <p class="description" id="opening_hours-description"><?= __("Opening hours (ex: Mon - Sat, 08 AM - 06 PM).", "dingo"); ?></p>
            <?php
        }, self::GROUP, self::SECTION_SLUG);
    }



    /**
     * Add submenu Restaurant to the Settings main menu
     *
     * @return void
     */
    public static function addmenu () : void
    {
        add_options_page(
            __("Restaurant Settings", "dingo"),
            __("Restaurant", "dingo"),
            "manage_options",
            self::GROUP,
            [self::class, "render"]
        );
    }



    /**
     * Display the informations
     *
     * @return void
     */
    public static function render () : void
    {
        ?>
        <div class="wrap">
            <h1><?= __("Restaurant Settings", "dingo"); ?></h1>
        </div>

        <form action="options.php" method="post">
            <?php settings_fields(self::GROUP); ?>
            <?php do_settings_sections(self::GROUP); ?>
            <?php submit_button(); ?>
        </form>

        <?php 
    }
}
