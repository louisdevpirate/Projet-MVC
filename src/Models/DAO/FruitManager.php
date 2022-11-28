<?php

namespace Models\DAO;

use PDO;

use Models\DTO\Fruit;

class FruitManager{

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

    public function save(Fruit $fruitToSave)
    {
        
        $createFruit = $this->db->prepare('INSERT INTO fruit(name, color, origin, price_per_kilo, user_id, description) VALUES(?,?,?,?,?,?)');

        $createFruit->execute([
            $fruitToSave->getName(),
            $fruitToSave->getColor(),
            $fruitToSave->getOrigin(),
            $fruitToSave->getPricePerKilo(),
            $fruitToSave->getAuthor()->getId(),  //On stocke l'id de l'utilisateur en BDD et non tout l'objet
            $fruitToSave->getDescription(),
        ]);

        //Fermeture de la requête
        $createFruit->closeCursor();

    }

    public function findAll(): array
    {

        $getFruits = $this->db->query('SELECT * FROM fruit');


        $fruitList = $getFruits->fetchAll(PDO::FETCH_ASSOC);

        $getFruits->closeCursor();

        

        foreach($fruitList as $fruit){

            $userManager = new UserManager();

            $authorObject = $userManager->findOneBy('id', $fruit['user_id']);

            $newFruit = new Fruit();

            $newFruit
                ->setId($fruit['id'])
                ->setName($fruit['name'])
                ->setColor($fruit['color'])
                ->setOrigin($fruit['origin'])
                ->setPricePerKilo($fruit['price_per_kilo'])
                ->setAuthor( $authorObject )
                ->setDescription($fruit['description'])
            ;

            $fruitsListObjects[] = $newFruit;
            
        }

        return $fruitsListObjects;

    }


    public function findOneBy(string $field, $value): ?Fruit
    {   

        $getFruit = $this->db->prepare('SELECT * FROM fruit WHERE ' . $field . ' = ?');

        $getFruit->execute([
            $value,
        ]);

        $foundFruit = $getFruit->fetch(PDO::FETCH_ASSOC);


        if(!empty($foundFruit))
        {

            $userManager = new UserManager();

            $authorObject = $userManager->findOneBy('id', $foundFruit['user_id']);

            $convertedFruit = new Fruit();

            $convertedFruit
                ->setId( $foundFruit ['id'] )
                ->setName( $foundFruit ['name'] )
                ->setColor( $foundFruit ['color'] )
                ->setOrigin( $foundFruit ['origin'] )
                ->setPricePerKilo( $foundFruit ['price_per_kilo'] )
                ->setAuthor(  $authorObject  )
                ->setDescription($foundFruit['description'])
            ;
        }

        return $convertedFruit ?? null;

    }

    public function delete(Fruit $fruitToDelete): void
    {
        $deleteFruit = $this->db->prepare('DELETE FROM fruit WHERE id = ?');

        $deleteFruit->execute([
            $fruitToDelete->getId(),
        ]);
    }

    public function update(Fruit $fruitToUpdate): void 
    {
        $updateFruit = $this->db->prepare('UPDATE fruit SET name=?, color=?, origin=?, price_per_kilo=?, description=? WHERE id=? ');

        $updateFruit->execute([
            $fruitToUpdate->getName(),
            $fruitToUpdate->getColor(),
            $fruitToUpdate->getOrigin(),
            $fruitToUpdate->getPricePerKilo(),
            $fruitToUpdate->getDescription(),
            $fruitToUpdate->getId(),
        ]);

    }

}