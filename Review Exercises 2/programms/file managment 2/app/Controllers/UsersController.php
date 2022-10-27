<?php

class UsersController
{
    public function __construct()
    {
        if (!auth()->check()) {
            redirect('/login');
        }
    }

    public function addUserForm()
    {
        render('add_user');
    }

    public function addUser()
    {
        // TODO: Implement
    }

    public function changePasswordForm()
    {
        render('change_password');
    }

    public function changePassword()
    {
        // TODO: Implement
    }
}
