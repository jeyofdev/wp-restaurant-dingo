<?php

namespace jeyofdev\wp\dingo\restaurant\extending\twig;

use \DateTime;
use Timber\Post;
use Twig\Environment;
use Twig\TwigFunction;



/**
 * Class that allows adding new functions to Twig
 */
class Functions
{
    /**
     * Use the symfony dump function to replace the twig dump function
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function dump (Environment $twig) : void
    {
        $twig->addFunction(new TwigFunction("dump", function ($value) {
            dump($value);
        }));
    }


    
    /**
     * Use the symfony function dd for debug dump and die
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function dd (Environment $twig) : void
    {
        $twig->addFunction(new TwigFunction("dd", function ($value) {
            dd($value);
        }));
    }



    /**
     * Set the class attribute of an html element depending on whether one is on the home page or not
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function add_class (Environment $twig) : void
    {
        $twig->addFunction(new TwigFunction("add_class", function (string $trueClass, string $falseClass) {
            return is_front_page() ? $trueClass : $falseClass;
        }));
    }



    /**
     * Display the categories associated with an article
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function category_by_post (Environment $twig) : void
    {
        $twig->addFunction(new TwigFunction("category_by_post", function (Post $post) {
            $categories = [];

            foreach ($post->categories as $category) {
                $categories[] = '<a href="' . get_category_link($category) . '">' . $category->name . '</a>';
            }

            return join(", ", $categories);
        }));
    }



    /**
     * Display the number of comments the current post has
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function comments_number (Environment $twig) : void
    {
        $twig->addFunction(new TwigFunction("comments_number", function () {
            comments_number(sprintf(__("%d Comment", "dingo"), __("%d Comment", "dingo"), __("%d Comments", "dingo")));
        }));
    }



    /**
     * Retrieve paginated links for archive post pages.
     *
     * @param Environment $twig
     *
     * @return void
     */
    public static function paginate_links (Environment $twig) : void
    {
        $twig->addFunction(new TwigFunction("paginate_links", function () {
            $pages = paginate_links([
                "type" => "array",
                "prev_text" => '<i class="ti-angle-left"></i>',
                "next_text" => '<i class="ti-angle-right"></i>'
            ]);
    
            if ($pages === null) {
                return;
            }

            $output = '<nav aria-label="pagination" class="blog-pagination justify-content-center d-flex">';
            $output .= '<ul class="pagination">';

            foreach ($pages as $page) {
                $active = strpos($page, "current") !== false;
                $class = "page-item";
    
                if ($active) {
                    $class .= " active";
                }

                $output .= '<li class="' . $class . '">';

                $output .= str_replace("page-numbers", "page-link", $page);
                $output .= '</li>';
            }

            $output .= '</nav>';

            return $output;
        }));
    }



    /**
     * Retrieves the permalink for the day archives with year and month.
     *
     * @param Environment $twig
     *
     * @return void
     */
    public static function get_day_link (Environment $twig) : void
    {
        $twig->addFunction(new TwigFunction("get_day_link", function (Post $post) {
            $post_date = new DateTime($post->date);

            $archive_year  = get_the_time($post_date->format("Y"), $post); 
            $archive_month = get_the_time($post_date->format("m"), $post); 
            $archive_day   = get_the_time($post_date->format("d"), $post); 
            
            return esc_url(get_day_link($archive_year, $archive_month, $archive_day));
        }));
    }



    /**
     * Format the display of the address in the contact page 
     *
     * @param Environment $twig
     *
     * @return void
     */
    public static function format_address (Environment $twig) : void
    {
        $twig->addFunction(new TwigFunction("format_address", function (string $address) {
            $address = explode(". ", $address);

            $output = '<h3>' . $address[1] . '</h3>';
            $output .= '<p>' . $address[0] . '</p>';

            return $output;
        }));
    }



    /**
     * Format the display of opening hours in the footer
     *
     * @param Environment $twig
     *
     * @return void
     */
    public static function format_hours (Environment $twig) : void {
        $twig->addFunction(new TwigFunction("format_hours", function (array $days, array $opening_hours) {
            $output = '';

            foreach ($days as $d_key => $day) {
                foreach ($opening_hours as $h_key => $hour) {
                    if ($h_key === $d_key) {
                        $output .= '<p><span>' . $day . '</span> : ' . $hour . '</p>';
                    }
                }
            }

            return $output;
        }));
    }
}
