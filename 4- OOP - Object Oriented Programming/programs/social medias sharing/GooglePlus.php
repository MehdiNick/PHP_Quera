<?php

class GooglePlus
{
    private $count = 0;
    private $file = __DIR__.'/google_plus';

    public function share_text($text)
    {
        file_put_contents($this->file, ++$count);
    }
}
