<?php

class UsersRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add($username, $password)
    {
        // TODO: Implement
    }

    public function getPassword($username)
    {
        // TODO: Implement
    }

    public function exists($username)
    {
        // TODO: Implement
    }

    public function changePassword($username, $password)
    {
        // TODO: Implement
    }
}
