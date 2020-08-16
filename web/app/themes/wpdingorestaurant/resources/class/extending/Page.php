<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use Timber\Core;
use Timber\CoreInterface;



/**
 * Gives access to useful informations for each page
 */
class Page extends Core  implements CoreInterface {

    /**
     * @var string
     */
    private $home_title;



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
        $this->home_title = $this->set_home_title();
    }



    /**
     * Set the title of the page that displays posts
     *
     * @return string
     */
    public function set_home_title () : string
    {
        return get_the_title(get_option("page_for_posts"));
    }



    /**
     * get the title of the page that displays posts
     *
     * @return string
     */
    public function home_title () : string
    {
        return $this->home_title;
    }



	/**
	 * @ignore
	 */
	public function meta( $field ) {
		return $this->__get($field);
	}
}
