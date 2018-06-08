<?php

// This REST web API was developed by Federico Fabre
// Argentina, September 2017.
//
// Check my work on https://federicofabre.com

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';
require 'includes/mongodb.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("templates/");

$app->get('/getPerfis', function (Request $request, Response $response, $args) {
    $mongo = new dbHandler();
    $result = $mongo->getAllPerfis();
    return $response->withJson($result);
});

$app->get('/perfil/{id}', function (Request $request, Response $response, $args) {
    $mongo = new dbHandler();
    $id = $args['id'];
    $result = $mongo->getIdPerfil($id);
    return $response->withJson($result);
});

$app->get('/getPosts', function (Request $request, Response $response, $args) {
    $mongo = new dbHandler();
    $result = $mongo->getAllPosts();
    return $response->withJson($result);
});

$app->post('/home', function (Request $request, Response $response) {
    return $this->renderer->render($response, "principal.php");
});

$app->get('/home', function (Request $request, Response $response) {
    return $this->renderer->render($response, "principal.php");
});

$app->get('/cadastro', function (Request $request, Response $response) {
    return $this->renderer->render($response, "registro.php");
});

$app->get('/login', function (Request $request, Response $response) {
    return $this->renderer->render($response, "login.php");
});

$app->get('/', function (Request $request, Response $response) {
    return $response->withRedirect('/login');
});

$app->run();
?>
