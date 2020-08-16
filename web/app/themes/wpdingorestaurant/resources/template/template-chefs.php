<?php

/**
 * Template Name: Page chefs
 * Template Post Type: page
 */

use jeyofdev\wp\dingo\restaurant\extending\Site;
use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$context["site"] = new Site();
$context["chefs"] = Timber::get_posts([
    "post_type" => "chef",
    "posts_per_page" => 3,
    "order" => "DESC"
]);

$templates = "pages/templates/chefs.twig";



Timber::render($templates, $context);
