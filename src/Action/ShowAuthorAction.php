<?php
/**
 * File Name: ShowAuthorAction.php
 * User: alexa
 */

namespace App\Action;


use App\Domain\User\Service\ShowAuthor;
use App\Domain\User\Service\ShowBook;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ShowAuthorAction
{
    private $showAuthor;

    public function __construct(ShowAuthor $showAuthor){
        $this->showAuthor = $showAuthor;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        $authors = $this->showAuthor->getAllAuthor();

        $result = [
            'author' => $authors
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}