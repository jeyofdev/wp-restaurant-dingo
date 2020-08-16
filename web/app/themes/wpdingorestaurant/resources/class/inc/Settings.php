<?php

namespace jeyofdev\wp\dingo\restaurant\inc;

use jeyofdev\wp\dingo\restaurant\options\RestaurantSettings;



/**
 * Class which manages all the setting options
 */
class Settings
{

    /**
     * Load all setting options
     *
     * @return void
     */
    public static function init () : void
    {
        RestaurantSettings::register();
    }
}