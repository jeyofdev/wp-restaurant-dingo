<?php

namespace jeyofdev\wp\dingo\restaurant\extending;

use Timber\Timber as TimberTimber;
use jeyofdev\wp\dingo\restaurant\Context;
use jeyofdev\wp\dingo\restaurant\extending\Page;



class Timber extends TimberTimber
{
    public function __construct()
    {
        parent::__construct();
        Twig::init();

        return [
            new Site(),
            new Page(),
            new Context()
        ];
    }
}