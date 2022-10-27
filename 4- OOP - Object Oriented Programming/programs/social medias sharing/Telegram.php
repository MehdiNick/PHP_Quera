<?php

class Telegram
{
    private $count = 0;
    private $file = __DIR__.'/telegram';

    public function sendMessage($text)
    {
        file_put_contents($this->file, ++$count);
    }
}
