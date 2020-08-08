<?php

namespace jeyofdev\wp\dingo\restaurant\inc;

use jeyofdev\wp\dingo\restaurant\extending\Timber;



/**
 * Class which manages the admin
 */
class Admin {

    public static function init () : void
    {
        self::post_type_chef_columns();
        self::post_type_testimonial_columns();
        self::post_type_food_menu_columns();
    }



    /**
     * Filters the columns displayed in the Posts list table for a chef post type
     *
     * @return void
     */
    public static function post_type_chef_columns () : void
    {
        add_filter("manage_chef_posts_columns", function ($columns) {
            return [
                "cb" => $columns["cb"],
                "thumbnail" => __("Thumbnail", "dingo"),
                "title" => $columns["title"],
                "date" => $columns["date"]
            ];
        });

        add_filter("manage_chef_posts_custom_column", function ($column, $postId) {
            if ($column === "thumbnail") {
                the_post_thumbnail("admin_column_thumbnail", $postId);
            }
        }, 10, 2);
    }



    /**
     * Filters the columns displayed in the Posts list table for a testimonial post type.
     *
     * @return void
     */
    public static function post_type_testimonial_columns () : void
    {
        add_filter("manage_testimonial_posts_columns", function ($columns) {
            return [
                "cb" => $columns["cb"],
                "title" => $columns["title"],
                "testimonial_author" => __("Author", "dingo"),
                "date" => $columns["date"]
            ];
        });

        add_filter("manage_testimonial_posts_custom_column", function ($column, $postId) {
            if ($column === "testimonial_author") {
                $post = Timber::get_post([
                    "post_type" => "testimonial",
                    "posts_per_page" => 1,
                    "post__in" => [$postId],
                    "post_status" => ["publish", "trash", "draft"]
                ]);

                echo $post->testimonial_author;
            }
        }, 10, 2);

        add_filter("manage_edit-testimonial_sortable_columns", function ($columns) {
            $columns["testimonial_author"] = "testimonial_author";
            return $columns;
        });
    }



    /**
     * Filters the columns displayed in the Posts list table for a food_menu post type.
     *
     * @return void
     */
    public static function post_type_food_menu_columns () : void
    {
        add_filter("manage_food_menu_posts_columns", function ($columns) {
            return [
                "cb" => $columns["cb"],
                "thumbnail" => __("Thumbnail", "dingo"),
                "title" => $columns["title"],
                "types" => __("Types", "dingo"),
                "date" => $columns["date"]
            ];
        });

        add_filter("manage_food_menu_posts_custom_column", function ($column, $postId) {
            if ($column === "thumbnail") {
                the_post_thumbnail("admin_column_thumbnail", $postId);
            } elseif ($column === "types") {
                $post = Timber::get_post([
                    "post_type" => "food_menu",
                    "posts_per_page" => 1,
                    "post__in" => [$postId],
                    "post_status" => ["publish", "trash", "draft"]
                ]);

                $terms = [];
                foreach ($post->terms as $term) {
                    $terms[] = $term->name;
                }

                echo join(", ", $terms);
            }
        }, 10, 2);
    }
}