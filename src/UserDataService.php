<?php

namespace App;

use Exception;

class UserDataService
{

    /**
     * @throws Exception
     */
    public function getUserByEmail($email): object
    {
        if (Validator::validateEmail($email)) {
            $connection = new Connection();
            $query = new UserQuery($connection->getDb());
            $user = $query->getByEmail($email);
            if (!$user) {
                throw new Exception('User with email ' . $email . ' not found.');
            }

            return $user;
        } else {
            throw new Exception('Invalid email address provided.');
        }
    }
}