<?php

namespace jeyofdev\wp\dingo\restaurant;

use jeyofdev\wp\dingo\restaurant\options\RestaurantSettings;
use Timber\Menu;
use Timber\Timber;



/**
 * class which manages the context array
 */
class Context {

    /**
     * Add information to context
     *
     * @return void
     */
    public static function add () : void
    {
        add_filter("timber/context", function (array $context) {
            $context["menu"] = new Menu("primary");

            if (is_home() || is_single() || is_archive() || is_search()) {
                $context["dynamic_sidebar_blog"] = Timber::get_widgets("blog");
            }

            $context["dynamic_sidebar_footer"] = Timber::get_widgets("footer");
            $context["rs"] = [
                "facebook" => get_option(RestaurantSettings::FACEBOOK),
                "twitter" => get_option(RestaurantSettings::TWITTER),
                "instagram" => get_option(RestaurantSettings::INSTAGRAM)
            ];

            return $context;
        });
    }
}
