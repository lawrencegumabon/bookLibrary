<?php

namespace Core\Middleware;

class Auth
{
    public function handle()
    {
        // IF LOGGED IN AND NAG REDIRECT SA REGISTER BBALIK LNAG SA /PROFILE
        if (!isset($_SESSION['user'])) {
            header('location: /sign-up');
            exit();
        }
        // if (!isset($_SESSION['owner'])) {
        //     header('location: /owner-login');
        //     exit();
        // }
        // elseif (!$_SESSION['owner'] ?? false) {
        //     header('location: /');
        //     exit();
        // }
    }
}
