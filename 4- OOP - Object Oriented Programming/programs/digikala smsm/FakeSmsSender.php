<?php

class FakeSmsSender implements SmsSenderInterface
{
   private string $serviceProvider = "MTN";
    private int $concurrentSendingMessagesNum = 5;

    public function sendMessages(array $numbers, array $bodies)
    {
         $numOfMessages = count($bodies);
         $numOfNumbers = count($numbers);

if($numOfMessages>$this->concurrentSendingMessagesNum){
    throw new SmsSendException();
}
echo $numOfMessages."\n";
for($i=0;$i<$numOfNumbers;$i++){
if(preg_match("/^09\d{9}$/", $numbers[$i])===1){
echo $numbers[$i].":".$bodies[$i]."\n";
}else{
    echo "Wrong number\n";
}
}

    }


    public function getMessagesLimit(): int
    {
        return $this->concurrentSendingMessagesNum;
    }

    public function getProviderName(): string
    {
return $this->serviceProvider; 
    }
}