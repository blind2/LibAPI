<?php
/**
 * File Name: ShowBookTitle.php
 * User: alexa
 */

namespace App\Domain\User\Service;


use App\Domain\User\Repository\ShowBookIDRepository;
use App\Domain\User\Repository\ShowBookTitleRepository;

final class ShowBookTitle
{
    private $repository;

    public function __construct(ShowBookTitleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function  getBook(): array
    {
        $books = $this->repository->selectSingleBook();
        return $books;
    }
}