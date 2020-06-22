<?php

/**
 * Template Name: Page chefs
 * Template Post Type: page
 */



use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["chefs"] = Timber::get_posts([
    "post_type" => "chef",
    "posts_per_page" => 3,
    "order" => "ASC"
]);

$templates = "pages/templates/chefs.twig";



Timber::render($templates, $context);
