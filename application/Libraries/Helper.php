<?php

namespace Application\Libraries;

class Helper
{
    public static function bcrypt($string) {
        return sha1($string);
    }

    public static function csrfToken() {
        if (!isset($_SESSION['token'])) {
            $token = md5(uniqid(rand(), TRUE));
            $_SESSION['token'] = $token;
            $_SESSION['token_time'] = time();
        }
        else
        {
            $token = $_SESSION['token'];
        }

        return $token;
    }

    public static function validateCsrfToken($csrfToken) {
        return $_SESSION['token'] === $csrfToken;
    }
}