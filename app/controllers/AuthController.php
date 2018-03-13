<?php

namespace App\Controllers;

use App\Core\App;

class AuthController
{
    protected $qb;

    public function __construct()
    {
        $this->qb = getQB();
    }

    public function login()
    {
        $input_login = $this->verificationTEXT($_POST['login']);
        $input_password = $this->verificationTEXT($_POST['password']);
        $userData = $this->qb->selectUserFromDB($input_login, $input_password);
        if (!empty($userData)) {
            $userData['success'] = true;
            session_start();
            $_SESSION['userData'] = $userData;
            session_write_close();
            return redirect('');
        }
    }

    protected function verificationTEXT($text)
    {
        $input_text = strip_tags($text);
        $input_text = htmlspecialchars($input_text);
        return $input_text;
    }

    public function logout()
    {
        session_start();
        $_SESSION['userData']['success'] = false;
        session_unset();
        redirect('');
    }
}