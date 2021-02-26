<?php
/**
 * File Name: BookCreator.php
 * User: alexa
 */

namespace App\Domain\User\Service;


use App\Domain\User\Repository\BookCreatorRepository;
use App\Domain\User\Repository\UserCreatorRepository;
use App\Exception\ValidationException;

final class BookCreator
{
    private $repository;

    public function __construct(BookCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createBook(array $data): int
    {

        // Insert user
        $bookID = $this->repository->insertBook($data);

        // Logging here: User created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));

        return $bookID;
    }

}