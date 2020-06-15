<?php

/**
 * The main template file
 */

use Timber\Timber;



$context = Timber::context();
$templates = "pages/index.twig";

Timber::render($templates, $context);