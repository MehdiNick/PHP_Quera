<?php

class Twitter
{
    private $count = 0;
    private $file = __DIR__.'/twitter';

    public function share($text)
    {
        file_put_contents($this->file, ++$count);
    }
}
