<?php

/**
 * The front page template file
 */

use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$context["food_menus_page"] = Timber::get_post([
    "post_type" => "page",
    "name" => "menus"
]);
$context["featured_food_menus"] = Timber::get_posts([
    "post_type" => "food_menu",
    "posts_per_page" => 3,
    "order" => "DESC"
]);
$context["food_menus"] = Timber::get_posts([
    "post_type" => "food_menu",
    "posts_per_page" => -1,
    "order" => "DESC"
]);
$context["food_menus_terms"] = Timber::get_terms([
    "post_type" => "food_menu",
    "taxonomy" => "food_menu_type"
]);

$context["chefs"] = Timber::get_posts([
    "post_type" => "chef",
    "posts_per_page" => 3,
    "order" => "DESC"
]);
$context["chefs_page"] = Timber::get_post([
    "post_type" => "page",
    "name" => "chefs"
]);
$context["testimonials"] = Timber::get_posts([
    "post_type" => "testimonial",
    "posts_per_page" => 10,
    "order" => "DESC"
]);
$context["about_page"] = Timber::get_post([
    "post_type" => "page",
    "name" => "about"
]);
$context["blog"] = Timber::get_posts([
    "post_type" => "post",
    "post_per_page" => 3,
    "order_by" => "DESC"
]);

$templates = "pages/front-page.twig";



Timber::render($templates, $context);