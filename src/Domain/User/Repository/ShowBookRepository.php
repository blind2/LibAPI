<?php
/**
 * File Name: ShowBookRepository.php
 * User: alexa
 */

namespace App\Domain\User\Repository;
use PDO;

class ShowBookRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function selectAllBook(): array
    {
        $sql = "SELECT * FROM livres";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}