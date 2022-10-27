<?php

class FakeSmsSender implements SmsSenderInterface
{
    private $provider_name = "demo";

    public function sendMessages(array $numbers, array $messages)
    {
        if (count($numbers) > $this->getMessagesLimit()) {
            throw new SmsSendException("failed to send message");
        }
        foreach ($numbers as $key => $number) {
            if (preg_match("/^09[0-9]{9}$/",$number)) {
                echo "$number:{$messages[$key]}\n";
            } else {
                echo "Wrong number\n";
            }
        }
    }

    public function getMessagesLimit(): int
    {
        return 2;
    }

    public function getProviderName(): string
    {
        return $this->provider_name;
    }
}