<?php
/**
 * File Name: ShowBookID.php
 * User: alexa
 */

namespace App\Domain\User\Service;


use App\Domain\User\Repository\ShowBookIDRepository;
use App\Domain\User\Repository\ShowBookRepository;

final class ShowBookID
{
    private $repository;

    public function __construct(ShowBookIDRepository $repository)
    {
        $this->repository = $repository;
    }

    public function  getBookByID(): array
    {
        $books = $this->repository->selectSingleBook();
        return $books;
    }

}