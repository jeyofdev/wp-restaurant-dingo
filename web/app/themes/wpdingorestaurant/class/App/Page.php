<?php

namespace jeyofdev\wp\dingo\restaurant\App;

use Timber\Core;
use Timber\CoreInterface;



/**
 * Gives access to useful information for each page
 */
class Page extends Core  implements CoreInterface {

    /**
     * @var string
     */
    public $title;



    public function __construct ()
    {
        $this->init();
    }



    /**
     * Executed for all pages of the site
     *
     * @return void
     */
    protected function init ()
    {
        $this->title = $this->get_title();
    }



    /**
     * Get the page title
     *
     * @return string|null
     */
    public function get_title () : string
    {
        if (is_home() || is_single()) {
            $this->title = __("Our Blog", "dingo");
        } else if (is_category()) {
            $this->title = __(single_cat_title("Our Blog : ", false), "dingo");
        } else if (is_search()) {
            $this->title = __("Search results", "dingo");
        }

        return $this->title;
    }



	/**
	 * @ignore
	 */
	public function meta( $field ) {
		return $this->__get($field);
	}
}
