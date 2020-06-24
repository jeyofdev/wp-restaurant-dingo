<?php

namespace jeyofdev\wp\dingo\restaurant\inc;



/**
 * Class which manages the post types
 */
class PostTypes {

    /**
     * Load all post types
     *
     * @return void
     */
    public static function load () : void
    {
        add_action("init", function () {
            self::register_post_type();
        });
    }



    /**
     * Registers post types
     *
     * @return void
     */
    public static function register_post_type () : void
    {
        register_post_type("chef", [
            "label" => __("Chefs", "dingo"),
            "labels" => [
                "name"                     => __("Chefs", "dingo"),
                "singular_name"            => __("Chef", "dingo"),
                "edit_item"                => __("Edit chef", "dingo"),
                "new_item"                 => __("New chef", "dingo"),
                "view_item"                => __("View chef", "dingo"),
                "view_items"               => __("View chefs", "dingo"),
                "search_items"             => __("Search chefs", "dingo"),
                "not_found"                => __("No chefs found.", "dingo"),
                "not_found_in_trash"       => __("No chefs found in trash.", "dingo"),
                "all_items"                => __("All chefs", "dingo")
            ],
            "public" => true,
            "hierarchical" => false,
            "exclude_from_search" => true,
            "menu_position" => 30,
            "menu_icon" => "dashicons-admin-users",
            "supports" => ["title", "thumbnail"],
            "show_in_rest" => false,
            "taxonomies" => [],
            "has_archive" => false
        ]);

        register_post_type("testimonial", [
            "label" => __("Testimonials", "dingo"),
            "labels" => [
                "name"                     => __("Testimonials", "dingo"),
                "singular_name"            => __("Testimonial", "dingo"),
                "edit_item"                => __("Edit testimonial", "dingo"),
                "new_item"                 => __("New testimonial", "dingo"),
                "view_item"                => __("View testimonial", "dingo"),
                "view_items"               => __("View testimonials", "dingo"),
                "search_items"             => __("Search testimonials", "dingo"),
                "not_found"                => __("No testimonials found.", "dingo"),
                "not_found_in_trash"       => __("No testimonials found in trash.", "dingo"),
                "all_items"                => __("All testimonials", "dingo")
            ],
            "public" => true,
            "hierarchical" => false,
            "exclude_from_search" => true,
            "menu_position" => 40,
            "menu_icon" => "dashicons-admin-users",
            "supports" => ["title", "editor", "thumbnail"],
            "show_in_rest" => true,
            "taxonomies" => [],
            "has_archive" => false
        ]);

        register_post_type("food_menu", [
            "label" => __("Food Menus", "dingo"),
            "labels" => [
                "name"                     => __("Food Menus", "dingo"),
                "singular_name"            => __("Food Menu", "dingo"),
                "edit_item"                => __("Edit food menu", "dingo"),
                "new_item"                 => __("New food menu", "dingo"),
                "view_item"                => __("View food menu", "dingo"),
                "view_items"               => __("View food menus", "dingo"),
                "search_items"             => __("Search food menus", "dingo"),
                "not_found"                => __("No food menus found.", "dingo"),
                "not_found_in_trash"       => __("No food menus found in trash.", "dingo"),
                "all_items"                => __("All food menus", "dingo")
            ],
            "public" => true,
            "hierarchical" => false,
            "exclude_from_search" => true,
            "menu_position" => 25,
            "menu_icon" => "dashicons-admin-users",
            "supports" => ["title", "editor", "thumbnail"],
            "show_in_rest" => false,
            "taxonomies" => ["food_menu_type"],
            "has_archive" => false
        ]);
    }
}
