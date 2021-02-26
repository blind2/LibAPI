<?php
/**
 * File Name: BookCreateAction.php
 * User: alexa
 */

namespace App\Action;


use App\Domain\User\Service\BookCreator;
use App\Domain\User\Service\UserCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class BookCreateAction
{
    private $bookCreator;

    public function __construct(BookCreator $bookCreator)
    {
        $this->bookCreator= $bookCreator;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        // Transform the result into the JSON representation
        $result = [
            'status' => 'le livre a ete ajoutee'
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}