<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');



    $app->post('/users', \App\Action\UserCreateAction::class);

    $app->post('/bookCreation', \App\Action\BookCreateAction::class);

    $app->get('/books', \App\Action\ShowBookAction::class);

    $app->get('/id', \App\Action\ShowBookIDAction::class);

    $app->get('/title', \App\Action\ShowBookTitleAction::class);

    $app->put('/bookModifier', \App\Action\BookModifierAction::class);

    $app->delete('/delete', \App\Action\DeleteBookAction::class);

    $app->get('/docs/v1', \App\Action\docs\SwaggerUiAction::class);

    //Route pour les Auteurs
    $app->get('/showAuthor', \App\Action\ShowAuthorAction::class);



};

