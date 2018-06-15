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

$app->get('/perfil/get', function (Request $request, Response $response, $args) {
    $mongo = new dbHandler();
    $result = $mongo->getAllPerfis();
    return $response->withJson($result);
});

$app->post('/perfil/entrar', function (Request $request, Response $response, $args) {
    $perfil = $request->getParsedBody();
    $mongo = new dbHandler();
    $result = $mongo->getLogin($perfil);
    return $response->withJson($result);
});

$app->post('/perfil/insert', function (Request $request, Response $response, $args) {
    $perfil = $request->getParsedBody();
    $mongo = new dbHandler();
    $result = $mongo->insertPerfil($perfil);
    return $response->withJson($result);
});

$app->get('/perfil/get/{id}', function (Request $request, Response $response, $args) {
    $mongo = new dbHandler();
    $result = $mongo->getPerfil($args['id']);
    return $response->withJson($result);
});

$app->get('/post/get', function (Request $request, Response $response, $args) {
    $mongo = new dbHandler();
    $result = $mongo->getPosts();
    return $response->withJson($result);
});

$app->get('/post/get/{id}', function (Request $request, Response $response, $args) {
    $mongo = new dbHandler();
    $result = $mongo->getPost($args['id']);
    return $response->withJson($result);
});

$app->post('/post/insert', function (Request $request, Response $response, $args) {
    $arrPost = $request->getParsedBody();
    $mongo = new dbHandler();
    $result = $mongo->insertPost($arrPost);
    return $response->withJson($result);
});

$app->put('/post/update/{id}', function (Request $request, Response $response, $args) {
    $arrPost = $request->getParsedBody();
    $mongo = new dbHandler();
    $result = $mongo->updatePost(intval($args['id']), $arrPost);
    return $response->withJson( $result);
});

$app->put('/post/update-comments/{id}', function (Request $request, Response $response, $args) {
    $arrPost = $request->getParsedBody();
    $mongo = new dbHandler();
    $result = $mongo->updateComments(intval($args['id']), $arrPost);
    return $response->withJson( $result);
});

$app->delete('/post/delete/{id}', function (Request $request, Response $response, $args) {
    $mongo = new dbHandler();
    $result = $mongo->removePost(intval($args['id']));
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
