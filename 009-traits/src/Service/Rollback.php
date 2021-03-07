<?php

namespace Service;

trait Rollback{
    /**
     * Delete remains from create() or modify()
     * @return void
     */
    public function rollback() :void
    {
        echo "Removing remains...\n";
        echo "deleted Service ".$this->domain."\n";
    }
}