<?php
/**
 * File Name: ShowBookTitleAction.php
 * User: alexa
 */

namespace App\Action;


use App\Domain\User\Service\ShowBookID;
use App\Domain\User\Service\ShowBookTitle;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ShowBookTitleAction
{
    private $showBookTitle;

    public function __construct(ShowBookTitle $showBookTitle){
        $this->showBookTitle = $showBookTitle;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $book= $this->showBookTitle->getBook();
        //$userId = $this->userCreator->createUser($data);

        // Transform the result into the JSON representation
        $result = [
            'book' => $book
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}