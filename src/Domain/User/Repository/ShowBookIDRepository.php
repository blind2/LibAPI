<?php
/**
 * File Name: ShowBookIDRepository.php
 * User: alexa
 */

namespace App\Domain\User\Repository;
use PDO;

class ShowBookIDRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function selectSingleBook(): array
    {
        $sql = "SELECT * FROM livres WHERE id =1 ";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}