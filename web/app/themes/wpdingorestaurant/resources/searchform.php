<?php


/**
 * The search form template file
 */

use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$templates = "parts/search-form.twig";



Timber::render($templates, $context);