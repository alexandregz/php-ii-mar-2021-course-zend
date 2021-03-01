<?php

namespace Server;

class Hosting {
    // we have only *nix systems
    public const HOME = '/home';

    protected string $domain;
    protected string $path;
    //protected string|null $email;
    protected string $email;

    private bool $_created = false;

    public function __construct(string $domain, string $path, string $email=null)
    {
        $this->domain = $domain;
        $this->path = $path;
        $this->email = $email;
    }

    /**
     * Create hosting
     *
     * If we have email, we created with email associated
     *
     * @return boolean
     */
    public function create()
    {
        // ToDo create hosting
        if($this->email) {
            //echo "Creating hosting with email into ".self::HOME;
        }
        else {
            //echo "Hosting without email";
        }

        if(rand(0, 1) === 1) {
            return false;
        }

        $this->_created = true;
        return true;
    }

    /**
     * Delete hosting
     */
    public function delete()
    {
        // ToDo delete hosting
    }

    /**
     * Check if hosting is created
     * @return bool
     */
    public function isCreated()
    {
        return $this->_created;
    }
}