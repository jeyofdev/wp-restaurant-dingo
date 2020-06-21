<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use Timber\Site as TimberSite;
use jeyofdev\wp\dingo\restaurant\inc\Assets;
use jeyofdev\wp\dingo\restaurant\inc\Images;
use jeyofdev\wp\dingo\restaurant\inc\Menus;
use jeyofdev\wp\dingo\restaurant\inc\Sidebar;
use jeyofdev\wp\dingo\restaurant\inc\Supports;



/**
 * Class which manages the useful information of the application
 */
class Site extends TimberSite
{
    public function __construct ()
    {
        parent::__construct();

        Supports::add();
        Menus::register();
        Assets::load();
        Images::load();
        Sidebar::init();
    }
}