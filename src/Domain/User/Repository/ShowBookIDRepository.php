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
        $number = $_GET["id"];
        $sql = "SELECT * FROM livres WHERE id = $number ";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}