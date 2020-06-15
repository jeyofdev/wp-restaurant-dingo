<?php

namespace jeyofdev\wp\dingo\restaurant\extension;

use Timber\Site as TimberSite;
use jeyofdev\wp\dingo\restaurant\inc\Assets;



/**
 * Class which manages the useful information of the application
 */
class Site extends TimberSite
{
    public function __construct ()
    {
        parent::__construct();
        Assets::load();
    }
}