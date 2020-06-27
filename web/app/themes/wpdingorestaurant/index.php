<?php

/**
 * The main template file
 */

use jeyofdev\wp\dingo\restaurant\extending\Timber;



$context = Timber::context();
$templates = "pages/index.twig";



Timber::render($templates, $context);