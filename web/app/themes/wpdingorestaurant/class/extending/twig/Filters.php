<?php

namespace jeyofdev\wp\dingo\restaurant\extending\twig;

use Twig\TwigFilter;
use Twig\Environment;



/**
 * Class that allows adding new filter to Twig
 */
class Filters
{
    /**
     * @var Environment $twig
     */
    public static $twig;



    /**
     * Set all new filters
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function add (Environment $twig)
    {
        self::$twig = $twig;
        self::chars();
    }



    /**
     * Display the excerpt of a text
     *
     * @return void
     */
    public static function chars () : void
    {
        self::$twig->addFilter(new TwigFilter("chars", function (string $text, ?int $limit = 20) {
            if (strlen($text) > $limit) {
                $last_space = strpos($text, " ", $limit);
                return substr($text, 0, $last_space) . "...";
            }

            return $text;
        }));
    }
}
