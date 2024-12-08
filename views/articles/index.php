<?php
session_start();
use App\Models\User;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
            margin-top: 30px;
        }

        .btn {
            width: 100px;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        /* Card cu dimensiuni fixe */
        .card {
            width: 320px;
            /* Lățimea fixă a cardului */
            height: 340px;
            /* Înălțimea fixă a cardului */
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            background: #fff;
            /* Fundal alb pentru card */
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 20px;
            background-color: #fff;
            text-align: center;
            overflow: hidden;
            width: 320px;
            height: 250px;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 100px;
            /* Ajustează în funcție de cât conținut vrei să afișezi */
        }

        .row {
            margin-top: 30px;
        }

        .no-products {
            text-align: center;
            font-size: 1.5rem;
            color: #888;
            margin-top: 40px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 30px;
        }

        .product-container .col-md-4 {
            max-width: 320px;
        }

        .card-footer {
            background-color: #f9f9f9;
            padding: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 0.9rem;
            color: #888;
        }

        .card-footer a {
            text-decoration: none;
            color: #007bff;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        .butoanele {
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php include '../views/navbar.php'; ?>

    <div class="container">
        <!-- Products Section -->
        <div class="product-container">
            <?php if (count($articles) > 0): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <!-- Card body -->
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($article->title) ?></h5>
                                <p class="card-text">
                                    <?= htmlspecialchars(substr($article->content, 0, 200)) ?>...
                                    <!-- Afișează doar primele 200 de caractere -->
                                </p>

                            </div>
                            <div class="butoanele d-flex justify-content-between">
                                <?php if (isset($_SESSION['user_id']) && User::find($_SESSION['user_id'])->isAdmin()): ?>
                                    <a href="/articole/edit/<?= $article->id ?>" class="btn btn-warning">Edit</a>
                                    <form action="/articole/delete/<?= $article->id ?>" method="POST" class="d-inline"
                                        onsubmit="return confirmDelete()">
                                        <input type="hidden" name="_METHOD" value="DELETE" />
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php endif; ?>
                                <a href="/articole/show/<?= $article->id ?>" class="btn btn-primary">Details</a>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <small>Added on: <?= date('d M Y', strtotime($article->created_at)) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 no-products">
                    <p>No articles available</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Esti sigur că vrei să ștergi acest articol?");
        }
    </script>
</body>

</html>