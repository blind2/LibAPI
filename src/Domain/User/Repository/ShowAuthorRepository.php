<?php
/**
 * File Name: ShowAuthorRepository.php
 * User: alexa
 */

namespace App\Domain\User\Repository;
use PDO;

class ShowAuthorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function selectAllAuthor(): array
    {
        $sql = "SELECT * FROM auteurs";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        //retourne la liste des auteurs
        return $result;
    }
}