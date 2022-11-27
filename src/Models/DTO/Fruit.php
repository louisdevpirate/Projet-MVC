<?php

namespace Models\DTO;




/**
 * Classe DTO (attributs + getters + setters) matérialisant les utilisateurs du site
 */
class Fruit{

    private int $id;
    private string $name;
    private string $color;
    private string $origin;
    private float $pricePerKilo;
    private string $description;
    private User $author;


    /**
     * Getters
     */
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function getPricePerKilo(): float
    {
        return $this->pricePerKilo;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }


    /**
     * Setters
     */


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;
        return $this;
    }
    
    public function setPricePerKilo(float $pricePerKilo): self
    {
        $this->pricePerKilo = $pricePerKilo;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;
        return $this;
    }
    
}