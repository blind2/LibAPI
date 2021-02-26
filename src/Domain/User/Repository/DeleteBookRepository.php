<?php
/**
 * File Name: DeleteBookRepository.php
 * User: alexa
 */

namespace App\Domain\User\Repository;
use PDO;

final class DeleteBookRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function deleteBook()
    {

        $number = $_GET["id"];
        $sql = "DELETE FROM livre_auteur where livres_id = $number;DElETE FROM livres WHERE id = $number ";
        $query = $this->connection->prepare($sql);
        $query->execute();
    }
}