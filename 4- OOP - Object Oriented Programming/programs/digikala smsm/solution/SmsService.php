<?php

class SmsService
{
    private $sender;

    public function __construct(SmsSenderInterface $sender)
    {
        $this->sender = $sender;
    }

    public function sendOne(string $body, string $number)
    {
        $this->sendMany([$body], [$number]);
    }

    public function sendMany(array $numbers, array $messages)
    {
        $max = $this->sender->getMessagesLimit();
        $slicedBodies = array_chunk($messages, $max);
        $slicedNumbers = array_chunk($numbers, $max);

        foreach ($slicedNumbers as $key => $numbers) {
            $this->sender->sendMessages($numbers, $slicedBodies[$key]);
        }
    }
}
