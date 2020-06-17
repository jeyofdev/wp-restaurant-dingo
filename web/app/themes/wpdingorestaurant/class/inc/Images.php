<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class which manages the images
 */
class Images {

    /**
     * Register all image sizes
     *
     * @return void
     */
    public static function load () : void
    {
        add_action("after_setup_theme", function () {
            add_image_size("post_thumbnail", 750, 375, true);
            add_image_size("pagination_between_post", 60, 60, true);
        });
    }
}