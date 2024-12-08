<?php
session_start();
use App\Models\User;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .article-details {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .article-details h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        .article-details p {
            font-size: 1.2rem;
            line-height: 1.8;
        }

        /* Stiluri pentru butoanele de sus */
        .butoanele {
            width: 976px;
            margin: 20px auto;
        }

        .butoanele .btn {
            font-size: 1rem;
            padding: 10px 20px;
            margin-right: 10px;
        }
        
    </style>
</head>

<body>

    <?php include '../views/navbar.php'; ?>

    <!-- Container pentru butoane -->
    <div class="container">
        <div class="butoanele d-flex justify-content-start">
            <?php if (isset($_SESSION['user_id']) && User::find($_SESSION['user_id'])->isAdmin()): ?>
                <a href="/articole/edit/<?= $article->id ?>" class="btn btn-warning">Edit</a>
                <form action="/articole/delete/<?= $article->id ?>" method="POST" class="d-inline"
                    onsubmit="return confirmDelete()">
                    <input type="hidden" name="_METHOD" value="DELETE" />
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="article-details">
                    <h1><?= $article->title ?></h1>
                    <div class="article-content">
                        <p><?= $article->content ?></p>
                    </div>
                    <small>Adaugata pe: <?= date('d M Y', strtotime($article->created_at)) ?></small>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Esti sigur că vrei să ștergi acest articol?");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
