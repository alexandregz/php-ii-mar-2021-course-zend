<?php

namespace Service;

interface Service {

    public function create(string $nameservice) :bool;
    public function delete(string $nameservice, bool $backup=false) :bool;
}