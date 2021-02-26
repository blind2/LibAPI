<?php
/**
 * File Name: ShowAuthor.php
 * User: alexa
 */

namespace App\Domain\User\Service;


use App\Domain\User\Repository\ShowAuthorRepository;
use App\Domain\User\Repository\ShowBookRepository;

final class ShowAuthor
{
    private $repository;

    public function __construct(ShowAuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function  getAllAuthor(): array{
        $author= $this->repository->selectAllAuthor();
        return $author;
    }
}