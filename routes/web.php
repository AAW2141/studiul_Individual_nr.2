<?php
use App\Controllers\UserController;
use App\Controllers\SectionController;

// Rutele pentru SectionController
$app->redirect('/', '/sections');
$app->get('/sections', [SectionController::class, 'index']);
$app->get('/sections/create', [SectionController::class, 'create']);
$app->post('/sections/store', [SectionController::class, 'store']);
$app->get('/sections/edit/{id}', [SectionController::class, 'edit']);
$app->put('/sections/update/{id}', [SectionController::class, 'update']);
$app->delete('/sections/delete/{id}', [SectionController::class, 'delete']);
$app->get('/sections/show/{id}', [SectionController::class, 'show']);

// Rutele pentru UserController
$app->get('/users/login', [UserController::class, 'login']);
$app->post('/users/login', [UserController::class, 'login']);
$app->get('/users/register', [UserController::class, 'register']);
$app->post('/users/register', [UserController::class, 'store']);
$app->get('/users/profile/{id}', [UserController::class, 'profile']);
$app->get('/users/logout', [UserController::class, 'logout']);




