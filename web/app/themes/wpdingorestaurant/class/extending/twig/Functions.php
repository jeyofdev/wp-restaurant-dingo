<?php

namespace jeyofdev\wp\dingo\restaurant\extending\twig;

use Timber\Post;
use Twig\Environment;
use Twig\TwigFunction;


/**
 * Class that allows adding new functions to Twig
 */
class Functions
{
    /**
     * @var Environment $twig
     */
    public static $twig;



    /**
     * Set all new functions
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function add (Environment $twig)
    {
        self::$twig = $twig;

        self::dump();
        self::dd();
        self::add_class();
        self::comments_number();
        self::category_by_post();
        self::paginate_links();
    }



    /**
     * Use the symfony dump function to replace the twig dump function
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function dump () : void
    {
        self::$twig->addFunction(new TwigFunction("dump", function ($value) {
            dump($value);
        }));
    }


    
    /**
     * Use the symfony function dd for debug dump and die
     *
     * @param Environment $twig
     * @return void
     */
    public static function dd () : void
    {
        self::$twig->addFunction(new TwigFunction("dd", function ($value) {
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
    public static function add_class () : void
    {
        self::$twig->addFunction(new TwigFunction("add_class", function ($trueClass, $falseClass) {
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
    public static function category_by_post () : void
    {
        self::$twig->addFunction(new TwigFunction("category_by_post", function (Post $post) {
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
    public static function comments_number () : void
    {
        self::$twig->addFunction(new TwigFunction("comments_number", function () {
            comments_number(sprintf(__("%d Comment", "dingo"), __("%d Comment", "dingo"), __("%d Comments", "dingo")));
        }));
    }



    /**
     * Retrieve paginated links for archive post pages.
     *
     * @return void
     */
    public static function paginate_links () : void
    {
        self::$twig->addFunction(new TwigFunction("paginate_links", function () {
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
}
