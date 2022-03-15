<?php

namespace App;

use Exception;

class App
{
    public static function run()
    {
        $request = new Request();
        $email = $request->getParam('email') ?: $request->getParam('masterEmail');
        $service = new UserDataService();
        try {
            $user = $service->getUserByEmail($email);
            echo 'The master email is ' . $user->email . '.<br/>';
            echo 'User found: ' . $user->name . '.<br/>';
        } catch (Exception $e) {
            echo $e->getMessage() . '<br/>';
        }
    }
}