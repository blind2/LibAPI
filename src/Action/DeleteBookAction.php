<?php
/**
 * File Name: DeleteBookAction.php
 * User: alexa
 */

namespace App\Action;


use App\Domain\User\Service\DeleteBook;
use App\Domain\User\Service\ShowBookID;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class DeleteBookAction
{
    private $deleteBook;

    public function __construct(DeleteBook $deleteBook){
        $this->deleteBook = $deleteBook;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $book= $this->deleteBook->deleteBook();
        //$userId = $this->userCreator->createUser($data);

        // Transform the result into the JSON representation
        $result = [
            'result' => $book
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}