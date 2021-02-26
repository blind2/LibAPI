<?php
/**
 * File Name: ShowBookTitleRepository.php
 * User: alexa
 */

namespace App\Domain\User\Repository;

use PDO;
class ShowBookTitleRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function selectSingleBook(): array
    {
        $title = $_GET["title"];
        $sql = "SELECT * FROM livres WHERE titre = $title";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}