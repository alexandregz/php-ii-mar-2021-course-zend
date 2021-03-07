<?php

namespace Service;

interface Service {

    public function create(string $nameservice);
    public function delete(string $nameservice, bool $backup=false);
}