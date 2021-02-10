<?php
/**
 * File Name: ShowBookAction.php
 * User: alexa
 */

namespace App\Action;


use App\Domain\User\Service\ShowBook;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ShowBookAction
{
    private $showBook;

    public function __construct(ShowBook $showBook){
        $this->showBook = $showBook;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $books = $this->showBook->getAllbook($data);
        //$userId = $this->userCreator->createUser($data);

        // Transform the result into the JSON representation
        $result = [
            'book' => $books
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}