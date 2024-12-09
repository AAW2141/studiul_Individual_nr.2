<?php
session_start();
use App\Models\User;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin-top: 30px;
        }

        .btn {
            width: 120px;
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

        /* Card cu dimensiuni fixe și stil îmbunătățit */
        .card {
            width: 320px;
            height: 380px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            background: linear-gradient(to right, #e0e0e0, #f8f9fa);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 20px;
            text-align: center;
            background-color: #ffffff;
            height: 250px;
            overflow: hidden;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
            text-overflow: ellipsis;
            display: flex;
            overflow: hidden;
            height: 100px;
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
            justify-content: center;
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
            transition: color 0.3s ease;
        }

        .card-footer a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .butoanele {
            padding: 10px;
            gap: 10px;
        }

        /* Butoane cu culoare uniformă și margini rotunjite */
        .btn-warning,
        .btn-danger,
        .btn-primary {
            background-color: #ffc107;
            border-radius: 20px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-warning:hover {
            background-color: #ffca2c;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #d92c3a;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
       
</head>

<body>
    <?php include '../views/navbar.php'; ?>

    <div class="container">
        <!-- Sections Section -->
        <div class="product-container">
            <?php if (count($sections) > 0): ?>
                <?php foreach ($sections as $section): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <!-- Card body -->
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($section->title) ?></h5>
                                <p class="card-text">
                                    <?= htmlspecialchars(substr($section->content, 0, 200)) ?>...
                                    <!-- Afișează doar primele 200 de caractere -->
                                </p>

                            </div>
                            <div class="butoanele d-flex justify-content-between">
                                <?php if (isset($_SESSION['user_id']) && User::find($_SESSION['user_id'])->isAdmin()): ?>
                                    <a href="/sections/edit/<?= $section->id ?>" class="btn btn-warning">Edit</a>
                                    <form action="/sections/delete/<?= $section->id ?>" method="POST" class="d-inline"
                                        onsubmit="return confirmDelete()">
                                        <input type="hidden" name="_METHOD" value="DELETE" />
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php endif; ?>
                                <a href="/sections/show/<?= $section->id ?>" class="btn btn-primary">Details</a>
                            </div>
                           
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 no-products">
                    <p>No sections available</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Esti sigur că vrei să ștergi această secțiune?");
        }
    </script>
</body>

</html>
