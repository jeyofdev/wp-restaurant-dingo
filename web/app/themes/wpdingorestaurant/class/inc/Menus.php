<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class that manages the menus
 */
class Menus {

    /**
     * Register the navigation menus location
     *
     * @return void
     */
    public static function register () : void
    {
        add_action("init", function () {
            register_nav_menu("primary", __("main navigation", "dingo"));
        });
    }
}