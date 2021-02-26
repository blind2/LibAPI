<?php
/**
 * File Name: BookModifierRepository.php
 * User: alexa
 */

namespace App\Domain\User\Repository;
use PDO;

final class BookModifierRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function modifyBook(array $book): int
    {
        $row = [
            'id'=>$book['id'],
            'genres_id' =>$book['genres_id'],
            'titre' => $book['titre'],
            'isbn' => $book['isbn']



        ];
        $sql = "UPDATE  livres SET 
                genres_id=:genres_id,
                titre=:titre,
                isbn=:isbn; where id=:id ";


        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }

}