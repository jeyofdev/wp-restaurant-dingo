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
use WordPlate\Acf\Fields\Url;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Number;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Wysiwyg;



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
                "chef_master" => __("Chef Master", "dingo"),
                "chef" => __("Chef", "dingo"),
            ])
            ->returnFormat("label"),
        Group::make(__("Social media", "dingo"), "social")
            ->required()
            ->instructions(__("add the chef's nickname on social networks", "dingo"))
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
 * Custom post type testimonial
 */
register_extended_field_group([
    "title" => __("Testimonial information", "dingo"),
    "fields" => [
        Text::make(__("Author", "dingo"), "writer")->required(),
        Text::make(__("Job", "dingo"), "job")->required()
    ],
    "location" => [
        Location::if("post_type", "==", "testimonial")
    ],
    "position" => "normal",
    "style" => "default",
    "label_placement" => "top",
    "instruction_placement" => "label",
    "active" => true,
]);



/**
 * Custom post type food menu
 */
register_extended_field_group([
    "title" => __("Food menu information", "dingo"),
    "fields" => [
        Number::make(__("Price", "dingo"), "price")
            ->required()
            ->prepend(__("$", "dingo"))
            ->step(1)
    ],
    "location" => [
        Location::if("post_type", "==", "food_menu")
    ],
    "position" => "normal",
    "style" => "default",
    "label_placement" => "top",
    "instruction_placement" => "label",
    "active" => true,
]);



/**
 * About section
 */
register_extended_field_group([
    "title" => __("About section", "dingo"),
    "fields" => [
        Text::make(__("Title", "dingo"), "about_section_title")
            ->required()
            ->defaultValue(__("Where The Food’s As Good As The Root Beer.", "dingo")),
        Text::make(__("Subtitle", "dingo"), "about_section_subtitle")
            ->required()
            ->defaultValue(__("Our History", "dingo")),
        Text::make(__("Introduction", "dingo"), "about_section_intro")
            ->required()
            ->defaultValue(__("Satisfying people hunger for simple pleasures", "dingo")),
        Wysiwyg::make(__("Content", "dingo"), "about_section_content")
            ->mediaUpload(false)
            ->tabs("visual")
            ->toolbar("basic")
            ->required(),
        Image::make(__("Content picture", "dingo"), "about_section_image")
            ->required()
            ->returnFormat("array")
            ->previewSize("medium")
            ->library("all"),
        Image::make(__("Background", "dingo"), "about_section_background")
            ->instructions(__("Add a background image", "dingo"))
            ->required()
            ->returnFormat("array")
            ->previewSize("medium")
            ->library("all")
    ],
    "location" => [
        Location::if("page_template", "==", "template/template-about.php")
    ],
    "menu_order" => 0,
    "position" => "normal",
    "style" => "default",
    "label_placement" => "left",
    "instruction_placement" => "label",
    "active" => true,
]);



/**
 * Testimonials section
 */
register_extended_field_group([
    "title" => __("Testimonials section", "dingo"),
    "fields" => [
        Text::make(__("Title", "dingo"), "testimonial_section_title")
            ->required()
            ->defaultValue(__("Customers Feedback", "dingo")),
        Text::make(__("Subtitle", "dingo"), "testimonial_section_subtitle")
            ->required()
            ->defaultValue(__("Testimonials", "dingo"))
    ],
    "location" => [
        Location::if("page_template", "==", "template/template-about.php")
    ],
    "menu_order" => 1,
    "position" => "normal",
    "style" => "default",
    "label_placement" => "left",
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
            ->defaultValue(__("Team Member", "dingo"))
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



/**
 * Food menus section
 */
register_extended_field_group([
    "title" => __("Food menus section", "dingo"),
    "fields" => [
        Text::make(__("Title", "dingo"), "food_menus_section_title")
            ->required()
            ->defaultValue(__("Delicious Food Menu", "dingo")),
        Text::make(__("Subtitle", "dingo"), "food_menus_section_subtitle")
            ->required()
            ->defaultValue(__("Popular menus", "dingo"))
    ],
    "location" => [
        Location::if("page_template", "==", "template/template-food-menus.php")
    ],
    "position" => "normal",
    "style" => "default",
    "label_placement" => "left",
    "instruction_placement" => "label",
    "active" => true,
]);



/**
 * Video section
 */
register_extended_field_group([
    "title" => __("Video section", "dingo"),
    "fields" => [
        Text::make(__("Title", "dingo"), "video_section_title")
            ->required()
            ->defaultValue(__("Expect The Best", "dingo")),
        Url::make(__("Video", "dingo"), "video_url")
            ->instructions(__("Add a youtubes presentation video", "dingo"))
            ->required()
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



/**
 * Home hero section
 */
register_extended_field_group([
    "title" => __("home top section", "dingo"),
    "fields" => [
        Text::make(__("Title", "dingo"), "home_top_section_title")
            ->required()
            ->defaultValue(__("Deliciousness jumping into the mouth", "dingo")),
        Text::make(__("Subtitle", "dingo"), "home_top_section_subtitle")
            ->required()
            ->defaultValue(__("Expensive But The Best", "dingo"))
    ],
    "location" => [
        Location::if("page_type", "==", "front_page")
    ],
    "menu_order" => 1,
    "position" => "normal",
    "style" => "default",
    "label_placement" => "left",
    "instruction_placement" => "label",
    "active" => true,
]);



/**
 * Featured food menus section
 */
register_extended_field_group([
    "title" => __("Featured food menus section", "dingo"),
    "fields" => [
        Text::make(__("Title", "dingo"), "featured_food_menus_section_title")
            ->required()
            ->defaultValue(__("Our Exclusive Items", "dingo")),
        Text::make(__("Subtitle", "dingo"), "featured_food_menus_section_subtitle")
            ->required()
            ->defaultValue(__("Popular Dishes", "dingo"))
    ],
    "location" => [
        Location::if("page_type", "==", "front_page")
    ],
    "menu_order" => 2,
    "position" => "normal",
    "style" => "default",
    "label_placement" => "left",
    "instruction_placement" => "label",
    "active" => true,
]);



/**
 * Blog section
 */
register_extended_field_group([
    "title" => __("Blog section", "dingo"),
    "fields" => [
        Text::make(__("Title", "dingo"), "blog_section_title")
            ->required()
            ->defaultValue(__("Latest From Blog", "dingo")),
        Text::make(__("Subtitle", "dingo"), "blog_section_subtitle")
            ->required()
            ->defaultValue(__("Recent News", "dingo"))
    ],
    "location" => [
        Location::if("page_type", "==", "front_page")
    ],
    "menu_order" => 3,
    "position" => "normal",
    "style" => "default",
    "label_placement" => "left",
    "instruction_placement" => "label",
    "active" => true,
]);

