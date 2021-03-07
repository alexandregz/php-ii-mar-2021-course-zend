<?php

namespace Service;

class HostingPersonal extends Hosting {

    private string $with_php;

    /**
     * HostingPersonal constructor.
     * @param string $domain
     * @param string $path
     * @param string|null $email
     * @param bool $with_php
     */
    public function __construct(string $domain, string $path, string $email=null, bool $with_php=false)
    {
        parent::__construct($domain, $path, $email);

        $this->with_php = $with_php;
    }

    /**
     * Extends create and control if we need add PHP-fpm to hosting
     * @return bool
     */
    public function create(string $nameservice)
    {
        if(parent::create($nameservice)) {
            if($this->with_php) {
                parent::addPhp();
            }
        }
    }
}
