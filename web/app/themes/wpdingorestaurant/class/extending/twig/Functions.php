<?php

namespace jeyofdev\wp\dingo\restaurant\extending\twig;

use Twig\Environment;
use Twig\TwigFunction;


/**
 * Class that allows adding new functions to Twig
 */
class Functions
{
    /**
     * Set all new functions
     *
     * @param Environment $twig
     * 
     * @return void
     */
    public static function add (Environment $twig)
    {
        self::add_class($twig);
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
        $twig->addFunction(new TwigFunction("add_class", function ($trueClass, $falseClass) {
            return is_front_page() ? $trueClass : $falseClass;
        }));
    }
}