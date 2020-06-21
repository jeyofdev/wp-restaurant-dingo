<?php

/**
 * The search form template file
 */

use Timber\Timber;
use jeyofdev\wp\dingo\restaurant\extending\Site;



$context = Timber::context();
$context["site"] = new Site();

$templates = "parts/search-form.twig";



Timber::render($templates, $context);