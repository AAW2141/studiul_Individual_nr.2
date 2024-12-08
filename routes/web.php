<?php
use App\Controllers\UserController;
use App\Controllers\ArticleController;
// Rutele pentru ProductController
$app->redirect('/', '/articole');
$app->get('/articole', [ArticleController::class, 'index']);
$app->get('/articole/create', [ArticleController::class, 'create']);
$app->post('/articole/store', [ArticleController::class, 'store']);
$app->get('/articole/edit/{id}', [ArticleController::class, 'edit']);
$app->put('/articole/update/{id}', [ArticleController::class, 'update']);
$app->delete('/articole/delete/{id}', [ArticleController::class, 'delete']);
$app->get('/articole/show/{id}', [ArticleController::class, 'show']);


// Rutele pentru UserController
$app->get('/users/login', [UserController::class, 'login']);
$app->post('/users/login', [UserController::class, 'login']);
$app->get('/users/register', [UserController::class, 'register']);
$app->post('/users/register', [UserController::class, 'store']);
$app->get('/users/profile/{id}', [UserController::class, 'profile']);
$app->get('/users/logout', [UserController::class, 'logout']);




