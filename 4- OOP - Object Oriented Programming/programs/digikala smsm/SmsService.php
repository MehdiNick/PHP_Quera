<?php

class SmsService
{
    private $sender;

    public function __construct(SmsSenderInterface $sender)
    {
        $this->sender = $sender;
    }

    public function sendOne(string $number, string $body)
    {
        $numberArray = array($number);
        $bodyArray = array($body);
        $this->sendMany($numberArray,$bodyArray);
    }

    public function sendMany(array $numbers, array $bodies)
    {
            $numOfMessages = count($bodies);
            $offset=0;
            $concurrentMessage = $this->sender->getMessagesLimit();

           while($numOfMessages>$concurrentMessage){
            $newNumbers = array_slice($numbers,$offset,$concurrentMessage);
            $newBodies = array_slice($bodies,$offset,$concurrentMessage);
            $offset+=$concurrentMessage;
            $numbers = array_slice($numbers,$offset);
            $bodies = array_slice($bodies,$offset);
            $this->sender->sendMessages($newNumbers,$newBodies);
            $numOfMessages = count($bodies);

           }
           if($numOfMessages>0){
          
            $this->sender->sendMessages($numbers,$bodies);

           }
        
    }
}
