<?php

require_once './vendor/autoload.php';
require_once './Application/autoload.php';

$app = new \Slim\Slim();

$app->group('/City', function () use ($app) {

    $app->get('/', function () use ($app) {
        try {
            $controller = new \Application\City\Controller();
            $result = $controller->findAll();
            $app->status(200);
            $app->response()->setBody(json_encode($result));
        } catch (\Exception $e) {
            $app->status(400);
            $app->response()->setBody(json_encode($e->getMessage()));
        }
    });

    $app->get('/:id', function ($id) use ($app) {
        try {
            $controller = new \Application\City\Controller();
            $result = $controller->findById($id);
            $app->status(200);
            $app->response()->setBody(json_encode($result));
        } catch (\Exception $e) {
            $app->status(400);
            $app->response()->setBody(json_encode($e->getMessage()));
        }
    });

    $app->post('/', function () use ($app) {

        try {
            $request = json_decode($app->request->getBody());
            $controller = new \Application\City\Controller();
            $result = $controller->create($request);
            $app->status(201); //created
            $app->response()->setBody(json_encode($result));
        } catch (\Exception $e) {
            $app->status(400);
            $app->response()->setBody(json_encode($e->getMessage()));
        }
    });

    $app->put('/:id', function () use ($app) {
        try {
            $request = json_decode($app->request->getBody());
            $controller = new \Application\City\Controller();
            $result = $controller->update($request);
            $app->status(201);
            $app->response()->setBody(json_encode($result));
        } catch (\Exception $e) {
            $app->status(400);
            $app->response()->setBody(json_encode($e->getMessage()));
        }
    });

    $app->delete('/:id', function ($id) use ($app) {
        try {
            $controller = new \Application\City\Controller();
            $result = $controller->remove((int) $id);
            $app->status(200);
            $app->response()->setBody(json_encode($result));
        } catch (\Exception $e) {
            $app->status(400);
            $app->response()->setBody(json_encode($e->getMessage()));
        }
    });
});



$app->run();
