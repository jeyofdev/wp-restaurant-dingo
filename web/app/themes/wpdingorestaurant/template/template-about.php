<?php

/**
 * Template Name: Page about
 * Template Post Type: page
 */



use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["testimonials"] = Timber::get_posts([
    "post_type" => "testimonial",
    "posts_per_page" => 10,
    "order" => "DESC"
]);
$context["chefs"] = Timber::get_posts([
    "post_type" => "chef",
    "posts_per_page" => 3,
    "order" => "DESC"
]);

$templates = "pages/templates/about.twig";



Timber::render($templates, $context);
