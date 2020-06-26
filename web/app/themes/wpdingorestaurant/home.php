<?php

/**
 * The blog template file
 */

use jeyofdev\wp\dingo\restaurant\App\Page;
use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();
$context["page"] = new Page();

$templates = "pages/home.twig";


Timber::render($templates, $context);