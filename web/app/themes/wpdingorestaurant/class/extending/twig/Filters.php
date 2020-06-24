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
        self::hashtag();
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



    /**
     * Format links to category archive pages by changing the class attribute and the label (adding a #)
     *
     * @return void
     */
    public static function hashtag () : void
    {
        self::$twig->addFilter(new TwigFilter("hashtag", function (string $text) {
            $content = explode(", ", $text);
            
            $newContent = [];
            foreach ($content as $string) {
                $newContent[] = str_replace('">', '" class="date_item"><span>#</span>', $string);
            }

            return join(", ", $newContent);
        }));
    }
}
