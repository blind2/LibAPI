<?php
/**
 * File Name: ShowBookIDAction.php
 * User: alexa
 */

namespace App\Action;

use App\Domain\User\Service\ShowBook;
use App\Domain\User\Service\ShowBookID;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ShowBookIDAction
{
    private $showBookID;

    public function __construct(ShowBookID $showBookID){
        $this->showBookID = $showBookID;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $booksID= $this->showBookID->getBookByID($data);
        //$userId = $this->userCreator->createUser($data);

        // Transform the result into the JSON representation
        $result = [
            'id' => $booksID
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}