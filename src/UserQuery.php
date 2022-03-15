<?php

namespace App;

use PDO;

class UserQuery
{

    private PDO $db;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function getByEmail(string $email)
    {
        $query = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();

        return $query->fetch();
    }
}