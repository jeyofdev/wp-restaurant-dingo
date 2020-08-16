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
     * Display the excerpt of a text
     *
     * @param Environment $twig
     *
     * @return void
     */
    public static function chars (Environment $twig) : void
    {
        $twig->addFilter(new TwigFilter("chars", function (string $text, ?int $limit = 20) {
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
     * @param Environment $twig
     *
     * @return void
     */
    public static function hashtag (Environment $twig) : void
    {
        $twig->addFilter(new TwigFilter("hashtag", function (string $text) {
            $content = explode(", ", $text);
            
            $newContent = [];
            foreach ($content as $string) {
                $newContent[] = str_replace('">', '" class="date_item"><span>#</span>', $string);
            }

            return join(", ", $newContent);
        }));
    }
}
