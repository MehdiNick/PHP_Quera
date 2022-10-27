<?php

class AuthController
{
    public function __construct()
    {
        if (auth()->check()) {
            redirect('/');
        }
    }

    public function loginForm()
    {
        render('login');
    }

    public function login()
    {
        // TODO: Implement
    }

    public function logout()
    {
        setcookie('authorization', null, -1);
        redirect('/login');
    }
}
