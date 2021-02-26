<?php
/**
 * File Name: BookModifierAction.php
 * User: alexa
 */

namespace App\Action;


use App\Domain\User\Service\BookCreator;
use App\Domain\User\Service\UserCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class BookModifierAction
{
    private $bookCreator;

    public function __construct(BookCreator $bookCreator )
    {
        $this->bookCreator = $bookCreator;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $bookiD = $this->bookCreator->createBook($data);

        // Transform the result into the JSON representation
        $result = [
            'book_id' => $bookiD
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}