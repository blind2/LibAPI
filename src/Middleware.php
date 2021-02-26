<?php
/**
 * File Name: Middleware.php
 * User: alexa
 */
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;


class Middleware
{
    //$str = 'username:alex password:admin';
    //dXNlcm5hbWU6YWxleCBwYXNzd29yZDphZG1pbg==
    public function __invoke(Request $request, RequestHandler $handler ): Response
    {
        $response = $handler->handle($request);
        $response->getBody()->write('AFTER');
        return $response;

    }
}