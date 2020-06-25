<?php

/**
 * Template Name: Page contact
 * Template Post Type: page
 */

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Site;
use jeyofdev\wp\dingo\restaurant\options\RestaurantSettings;



$context = Timber::context();
$context["site"] = new Site();
$context["contact"] = [
    "address" => get_option(RestaurantSettings::ADDRESS),
    "phone" => get_option(RestaurantSettings::PHONE),
    "email" => !empty(get_option(RestaurantSettings::EMAIL)) ? get_option(RestaurantSettings::EMAIL) : get_option("admin_email")
];

$templates = "pages/templates/contact.twig";



Timber::render($templates, $context);
