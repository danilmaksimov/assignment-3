<?php

namespace App;

class Validator
{

    public static function validateEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}