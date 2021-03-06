<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class which manages the theme supports
 */
class Supports {

    /**
     * Registers theme supports
     *
     * @return void
     */
    public static function init () : void
    {
        add_action("after_setup_theme", function () {
            add_theme_support("title-tag");
            add_theme_support("html5");
            add_theme_support("menus");
            add_theme_support("post-thumbnails", ["post", "food_menu", "chef", "testimonial"]);

            load_theme_textdomain("dingo", get_template_directory() . "/languages/");
        });
    }
}