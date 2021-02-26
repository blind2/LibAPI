<?php
/**
 * File Name: DeleteBook.php
 * User: alexa
 */

namespace App\Domain\User\Service;


use App\Domain\User\Repository\DeleteBookRepository;
use App\Domain\User\Repository\ShowBookTitleRepository;

final class DeleteBook
{
    private $repository;

    public function __construct(DeleteBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function  deleteBook()
    {
        $this->repository->deleteBook();
        return true;
    }
}