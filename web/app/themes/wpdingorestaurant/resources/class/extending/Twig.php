<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use Twig\Environment;
use Timber\Twig_Function;
use Timber\Twig as TimberTwig;
use jeyofdev\wp\dingo\restaurant\extending\twig\Filters;
use jeyofdev\wp\dingo\restaurant\extending\twig\Functions;



/**
 * Class which allows to add functionality to Twig
 */
class Twig extends TimberTwig
{
    /**
	 * @codeCoverageIgnore
	 */
	public static function init() {
		$self = new self();

		add_action( 'timber/twig/filters', array( $self, 'add_timber_filters' ) );
		add_action( 'timber/twig/functions', array( $self, 'add_timber_functions' ) );
		add_action( 'timber/twig/escapers', array( $self, 'add_timber_escapers' ) );
	}



    /**
	 * Adds functions to Twig.
	 *
	 * @param Environment $twig The Twig Environment
     * 
	 * @return Environment
	 */
	
    public function add_timber_functions($twig) {
        $twig->addFunction(new Twig_Function("previous_post_link", "previous_post_link"));
        $twig->addFunction(new Twig_Function("next_post_link", "next_post_link"));
        $twig->addFunction(new Twig_Function("single_term_title", "single_term_title"));
        $twig->addFunction(new Twig_Function("get_avatar", "get_avatar"));
        $twig->addFunction(new Twig_Function("get_option", "get_option"));
        $twig->addFunction(new Twig_Function("is_date", "is_date"));

        Functions::dump($twig);
        Functions::dd($twig);
        Functions::add_class($twig);
        Functions::comments_number($twig);
        Functions::category_by_post($twig);
        Functions::paginate_links($twig);
        Functions::get_day_link($twig);
        Functions::format_address($twig);
        Functions::format_hours($twig);

		return $twig;
    }



	/**
	 * Adds filters to Twig
	 *
	 * @param Environment $twig The Twig Environment
     * 
	 * @return Environment
	 */
    public function add_timber_filters($twig) {
        Filters::chars($twig);
        Filters::hashtag($twig);

		return $twig;
	}
}