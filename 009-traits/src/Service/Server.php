<?php

namespace Service;

use Service\Rollback;

class Server implements Service {
    protected string $server;

    public function __construct(string $server)
    {
        $this->server = $server;
    }

    public function create() :bool
    {
        // TODO: Implement create() method.
        return true;
    }

    public function delete(): bool
    {
        $this->rollback($this->server);

        // TODO: Implement delete() method.
        return false;
    }
}