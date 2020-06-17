<?php

namespace jeyofdev\wp\dingo\restaurant\inc;

use jeyofdev\wp\dingo\restaurant\extending\Post;

/**
 * Class which manages the paginations
 */
class Pagination {

    /**
     * Load custom paginations
     *
     * @return void
     */
    public static function load () : void
    {
        self::previous_post_link();
        self::next_post_link();
    }



    /**
     * Display the previous post link that is adjacent to the current post
     *
     * @return void
     */
    public static function previous_post_link () : void
    {
        add_filter("previous_post_link", function ($output) {
            $previousPost = get_adjacent_post();
        
            if ($previousPost !== '') {
                $previousPostTitle = strlen(get_the_title($previousPost)) > 30 ? substr(get_the_title($previousPost), 0, 30) . "..." : get_the_title($previousPost);

                $output = '<div class="thumb">';
                $output .= '<a href="' . get_the_permalink($previousPost). '">' . get_the_post_thumbnail($previousPost, "pagination_between_post", ["class" => "img-fluid"]) . '</a>';
                $output .= '</div>';
        
                $output .= '<div class="arrow">';
                $output .= '<a href="' . get_the_permalink($previousPost). '"><span class="lnr text-white ti-arrow-left"></span></a>';
                $output .= '</div>';
        
                $output .= '<div class="detials">';
                $output .= '<p>' . __("Prev Post", "dingo") . '</p>';
                $output .= '<a href="' . get_the_permalink($previousPost). '"><h4>' . $previousPostTitle . '</h4></a>';
                $output .= '</div>';
            } else {
                $output = '';
            }
        
            return $output;
        });
    }



    /**
     * Display the next post link that is adjacent to the current post
     *
     * @return void
     */
    public static function next_post_link () : void
    {
        add_filter("next_post_link", function ($output) {
            $nextPost = get_adjacent_post(false, '', false);

            if ($nextPost !== '') {
                $nextPostTitle = strlen(get_the_title($nextPost)) > 30 ? substr(get_the_title($nextPost), 0, 30) . "..." : get_the_title($nextPost);

                $output = '<div class="detials">';
                $output .= '<p>' . __("Next Post", "dingo") . '</p>';
                $output .= '<a href="' . get_the_permalink($nextPost). '"><h4>' . $nextPostTitle . '</h4></a>';
                $output .= '</div>';
            
                $output .= '<div class="arrow">';
                $output .= '<a href="' . get_the_permalink($nextPost). '"><span class="lnr text-white ti-arrow-right"></span></a>';
                $output .= '</div>';
            
                $output .= '<div class="thumb">';
                $output .= '<a href="' . get_the_permalink($nextPost). '">' . get_the_post_thumbnail($nextPost, "pagination_between_post", ["class" => "img-fluid"]) . '</a>';
                $output .= '</div>';
            } else {
                $output = '';
            }

            return $output;
        });
    }
}