<?php
/**
 * File Name: BookCreatorRepository.php
 * User: alexa
 */

namespace App\Domain\User\Repository;
use PDO;

class BookCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertBook(array $book): int
    {
        $row = [
            'genres_id' => $book['genres_id'],
            'titre' => $book['titre'],
            'isbn' => $book['isbn'],
        ];

        $sql = "INSERT INTO livres SET 
                genres_id=:genres_id,
                titre=:titre, 
                isbn=:isbn;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }

}