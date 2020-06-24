<?php

/**
 * Template Name: Page food menus
 * Template Post Type: page
 */



use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["food_menus"] = Timber::get_posts([
    "post_type" => "food_menu",
    "posts_per_page" => -1,
    "order" => "DESC"
]);
$context["food_menus_terms"] = Timber::get_terms([
    "post_type" => "food_menu",
    "taxonomy" => 'food_menu_type'
]);
$context["chefs_page"] = Timber::get_post([
    "post_type" => "page",
    "name" => "chefs"
]);

$templates = "pages/templates/food-menus.twig";



Timber::render($templates, $context);
