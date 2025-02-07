<?php

class UserAuth
{
    public function createUser()
    {
        return $this->insertUser();
    }

    public function Login()
    {
        return $this->userLogin();
    }

    private function insertUser()
    {
        return "INSERT INTO table_user (name, email, password, created_at) VALUES (?, ?, ?, ?)";
    }

    private function userLogin()
    {
        return "SELECT * FROM table_user WHERE email = ?";
    }
}
