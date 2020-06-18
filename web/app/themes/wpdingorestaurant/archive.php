<?php

/**
 * The template for displaying Archive pages.
 */

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\App\Page;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["page"] = new Page();

$templates = "pages/archive.twig";



Timber::render($templates, $context);