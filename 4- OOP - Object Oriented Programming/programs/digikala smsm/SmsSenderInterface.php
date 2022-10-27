<?php
interface SmsSenderInterface{


public function sendMessages(array $numbers, array $bodies);

    public function getMessagesLimit();

    public function getProviderName();

}
// TODO: Implement SmsSenderInterface interface here
