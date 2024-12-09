<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Section;
use App\Models\User;

class SectionController
{
    // Listare secțiuni
    public function index(Request $request, Response $response, $args)
    {
        // Obține toate secțiunile
        $sections = Section::all();

        ob_start();
        require '../views/sections/index.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    // Formular pentru creare secțiune
    public function create(Request $request, Response $response, $args)
    {
        session_start();
        $userId = $_SESSION['user_id'] ?? null;

        // Verifică dacă utilizatorul este autentificat și este admin
        if (!$userId || User::find($userId)->role !== 'admin') {
            $errorMessage = "Acces interzis! Trebuie să fii administrator pentru a crea o secțiune.";

            ob_start();
            require '../views/errors/access_denied.php'; 
            $html = ob_get_clean();
            $response->getBody()->write($html);
            return $response;
        }

        ob_start();
        require '../views/sections/create.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    // Creare secțiune
    public function store(Request $request, Response $response, $args)
    {
        // Preia datele din formular
        $sectionData = $request->getParsedBody();

        // Creează secțiunea
        Section::create($sectionData);

        // Redirecționează utilizatorul
        return $response
            ->withHeader('Location', '/')
            ->withStatus(302);
    }

    // Formular pentru editare secțiune
    public function edit(Request $request, Response $response, $args)
    {
        $section = Section::find($args['id']);

        ob_start();
        require '../views/sections/edit.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    // Actualizare secțiune
    public function update(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $section = Section::find($args['id']);

        // Actualizează secțiunea cu noile date
        $section->fill($data);
        $section->save();

        // Redirecționează utilizatorul
        return $response
            ->withHeader('Location', '/sections')
            ->withStatus(302);
    }

    // Ștergere secțiune
    public function delete(Request $request, Response $response, $args)
    {
        $section = Section::find($args['id']);
        $section->delete();

        return $response
            ->withHeader('Location', '/sections')
            ->withStatus(302);
    }

    // Afișare detalii secțiune
    public function show(Request $request, Response $response, $args)
    {
        $section = Section::find($args['id']);
        ob_start();
        require '../views/sections/details.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }
}
