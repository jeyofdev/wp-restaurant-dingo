<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use Twig\Environment;
use jeyofdev\wp\dingo\restaurant\extending\twig\Functions;



/**
 * Class which allows to add functionality to Twig
 */
class Twig
{
    public function __construct ()
    {
        add_filter("timber/twig", function (Environment $twig) {
            $this->add_function($twig);

            return $twig;
        } );
    }



    /**
     * Add all new functions to Twig
     *
     * @return void
     */
    private function add_function (Environment $twig) : void
    {
        Functions::add($twig);
    }
}