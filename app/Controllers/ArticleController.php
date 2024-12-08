<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Article;
use App\Models\User;

class ArticleController
{
    // Listare articole
    public function index(Request $request, Response $response, $args)
    {
        // Obține toate articolele
        $articles = Article::all();

        ob_start();
        require '../views/articles/index.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    // Formular pentru creare articol
    // Formular pentru creare articol
    public function create(Request $request, Response $response, $args)
    {
        session_start();
        $userId = $_SESSION['user_id'] ?? null;

        // Verifică dacă utilizatorul este autentificat și este admin
        if (!$userId || User::find($userId)->role !== 'admin') {
            // Afișează un mesaj de eroare
            $errorMessage = "Acces interzis! Trebuie să fii administrator pentru a crea un articol.";

            ob_start();
            require '../views/errors/access_denied.php'; // Aici adaugi o pagină de eroare personalizată
            $html = ob_get_clean();
            $response->getBody()->write($html);
            return $response;
        }

        ob_start();
        require '../views/articles/create.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    // Creare articol
    public function store(Request $request, Response $response, $args)
    {
        // Preia datele din formular
        $articleData = $request->getParsedBody();

        // Creează articolul
        Article::create($articleData);

        // Redirecționează utilizatorul
        return $response
            ->withHeader('Location', '/')
            ->withStatus(302);
    }

    // Formular pentru editare articol
    public function edit(Request $request, Response $response, $args)
    {
        $article = Article::find($args['id']);

        ob_start();
        require '../views/articles/edit.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    // Actualizare articol
    public function update(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $article = Article::find($args['id']);

        // Actualizează articolul cu noile date
        $article->fill($data);
        $article->save();

        // Redirecționează utilizatorul
        return $response
            ->withHeader('Location', '/articole')
            ->withStatus(302);
    }

    // Ștergere articol
    public function delete(Request $request, Response $response, $args)
    {
        $article = Article::find($args['id']);
        $article->delete();

        return $response
            ->withHeader('Location', '/articole')
            ->withStatus(302);
    }

    // Afișare detalii articol
    public function show(Request $request, Response $response, $args)
    {
        $article = Article::find($args['id']);
        ob_start();
        require '../views/articles/details.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }
}
