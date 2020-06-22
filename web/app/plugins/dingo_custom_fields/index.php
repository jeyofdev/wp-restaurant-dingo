<?php

/**
 * Custom fields for theme 'dingo'
 *
 * Plugin Name:  dingo_custom_fields
 * Text Domain: dingoplugin
 * Domain Path: /languages
 * Requires PHP: 7.1
 *
 */

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Select;



defined("ABSPATH") or die("unauthorized");

if (!function_exists("register_extended_field_group")) {
    return;
}



/**
 * Custom post type chef
 */
register_extended_field_group([
    "title" => __("Informations", "dingo"),
    "fields" => [
        Select::make(__("Job", "dingo"), "job")
            ->required()
            ->choices([
                "chef_master" => "Chef Master",
                "chef" => "Chef",
            ])
            ->returnFormat("label"),
        Group::make(__("Social media", "dingo"), "social_media")
            ->required()
            ->instructions("add the chef's nickname on social networks")
            ->layout("row")
            ->fields([
                Text::make(__("Facebook", "dingo"), "facebook")->placeholder("john-doe")->prepend("https://www.facebook.com/"),
                Text::make(__("Twitter", "dingo"), "twitter")->placeholder("john-doe")->prepend("https://twitter.com/"),
                Text::make(__("Instagram", "dingo"), "instagram")->placeholder("john-doe")->prepend("https://www.instagram.com/"),
                Text::make(__("Email", "dingo"), "email")->placeholder("john-doe@contact.com"),
            ])
    ],
    "location" => [
        Location::if("post_type", "==", "chef")
    ],
    "position" => "normal",
    "style" => "default",
    "label_placement" => "top",
    "instruction_placement" => "label",
    "active" => true,
]);



/**
 * Chefs section
 */
register_extended_field_group([
    "title" => __("Chefs section", "dingo"),
    "fields" => [
        Text::make(__("Title", "dingo"), "chef_section_title")
            ->required()
            ->defaultValue(__("Our Experience Chefs", "dingo")),
        Text::make(__("Subtitle", "dingo"), "chef_section_subtitle")
            ->required()
            ->defaultValue(__("Team Member", "dingo")),
    ],
    "location" => [
        Location::if("page_template", "==", "template/template-chefs.php")
    ],
    "position" => "normal",
    "style" => "default",
    "label_placement" => "left",
    "instruction_placement" => "label",
    "active" => true,
]);
