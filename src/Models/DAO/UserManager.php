<?php

namespace Models\DAO;

use PDO;
use DateTime;
use Models\DTO\User;

class UserManager{

    private PDO $db;

    public function getDb(): PDO
    {
        return $this->db;
    }

    public function setDb(PDO $db): self
    {
        $this->db = $db;
        return $this;
    }

    public function __construct()
    {
        $this->setDb( connectDb() );
    }

    public function save(User $userToSave)
    {
        $createUser = $this->db->prepare('INSERT INTO user(email, password, register_date, firstname, lastname) VALUES(?,?,?,?,?)');

        $createUser->execute([
            $userToSave->getEmail(),
            $userToSave->getPassword(),
            $userToSave->getRegisterDate()->format('Y-m-d H:i:s'),
            $userToSave->getFirstname(),
            $userToSave->getLastname(),
        ]);

        $createUser->closeCursor();
    }

    public function findOneBy(string $field, $value): ?User
    {

        $getUser = $this->db->prepare('SELECT * FROM user WHERE ' . $field . ' = ?');

        $getUser->execute([
            $value,
        ]);

        $foundUser = $getUser->fetch(PDO::FETCH_ASSOC);

        if(!empty($foundUser)){
            $convertedUser = new User();

            $convertedUser
                ->setId( $foundUser['id'] )
                ->setEmail( $foundUser['email'] )
                ->setPassword( $foundUser['password'] )
                ->setRegisterDate( new DateTime($foundUser['register_date']) )
                ->setFirstname( $foundUser['firstname'] )
                ->setLastname( $foundUser['lastname'] )
            ;
        }

        return $convertedUser ?? null;
    }


}