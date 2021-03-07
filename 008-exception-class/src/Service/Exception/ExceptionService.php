<?php

namespace Service\Exception;

class ExceptionService extends \Exception {

    public function __construct(string $msg, ?int $code) {
        parent::__construct($msg, $code);

        $this->toLog($msg, $code);
    }

    private function toLog(string $msg, ?int $code) :void
    {
        $msg_to_log = "[".date("Y-m-d H:i:s")."] [CODE: $code] $msg -- ".$this->getTraceAsString()."\n";
        file_put_contents('logs/exceptions.log', $msg_to_log, FILE_APPEND);
    }
}