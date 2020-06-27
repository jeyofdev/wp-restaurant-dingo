<?php

namespace jeyofdev\wp\dingo\restaurant;

use Timber\Menu;
use jeyofdev\wp\dingo\restaurant\extending\Site;
use jeyofdev\wp\dingo\restaurant\options\RestaurantSettings;
use jeyofdev\wp\dingo\restaurant\extending\Timber;



/**
 * class which manages the context array
 */
class Context {

    /**
     * @var array
     */
    public $context;



    public function __construct ()
    {
        add_filter("timber/context", function ($context) {
            $this->context = $context;

            $this->add("site", new Site());

            $this->add("options", [
                "date_format" => get_option("date_format"),
                "time_format" => get_option("time_format"),
            ]);

            $this->add("menu", new Menu("primary"));

            if (is_home() || is_single() || is_archive() || is_search()) {
                $this->add("dynamic_sidebar_blog", Timber::get_widgets("blog"));
            }

            $this->add("dynamic_sidebar_footer", Timber::get_widgets("footer"));
            $this->add("rs", [
                "facebook" => get_option(RestaurantSettings::FACEBOOK),
                "twitter" => get_option(RestaurantSettings::TWITTER),
                "instagram" => get_option(RestaurantSettings::INSTAGRAM)
            ]);

            return $this->context;
        });
    }



    /**
     * Add informations to context
     *
     * @param string $key
     * @param mixed $value
     * 
     * @return self
     */
    public function add (string $key, $value) : self
    {
        $this->context[$key] =  $value;
        return $this;
    } 
}
