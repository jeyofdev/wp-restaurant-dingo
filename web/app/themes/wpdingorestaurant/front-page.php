<?php

/**
 * The front page template file
 */

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["blog"] = Timber::get_posts([
    "post_type" => "post",
    "post_per_page" => 3,
    "order_by" => "DESC"
]);

$templates = "pages/front-page.twig";



Timber::render($templates, $context);