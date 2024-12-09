<?php
session_start();
use App\Models\User;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $section->title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .section-details {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .section-details h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        .section-details p {
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
                <a href="/sections/edit/<?= $section->id ?>" class="btn btn-warning">Edit</a>
                <form action="/sections/delete/<?= $section->id ?>" method="POST" class="d-inline"
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
                <div class="section-details">
                    <h1><?= $section->title ?></h1>
                    <div class="section-content">
                        <p><?= $section->content ?></p>
                    </div>
                </div>
            </div>
             <a href="/" class="btn btn-primary my-4 col-3">Inapoi</a>
        </div>
        
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this section?");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
