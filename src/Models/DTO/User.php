<?php

namespace Models\DTO;


use DateTime;


/**
 * Classe DTO (attributs + getters + setters) matérialisant les utilisateurs du site
 */
class User{

    private int $id;
    private string $email;
    private string $password;
    private DateTime $registerDate;
    private string $firstname;
    private string $lastname;


    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRegisterDate(): DateTime
    {
        return $this->registerDate;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function setRegisterDate(DateTime $registerDate): self
    {
        $this->registerDate = $registerDate;
        return $this;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

}