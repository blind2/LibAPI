<?php
/**
 * File Name: ShowBook.php
 * User: alexa
 */

namespace App\Domain\User\Service;


use App\Domain\User\Repository\ShowBookRepository;
use App\Domain\User\Repository\UserCreatorRepository;

final class ShowBook
{
    private $repository;

    public function __construct(ShowBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function  getAllbook(): array{
        $books= $this->repository->selectAllBook();
        return $books;
    }



}