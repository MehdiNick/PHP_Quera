<?php

class SmsSendException extends Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}
