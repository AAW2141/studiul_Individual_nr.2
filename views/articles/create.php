<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container.c {
            margin-top: 50px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        .form-container .form-control,
        .form-container .form-select {
            border-radius: 10px;
            box-shadow: none;
        }

        .form-container .btn {
            width: 100%;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-container .btn-dark {
            background-color: #343a40;
            border: none;
        }

        .form-container .btn-dark:hover {
            background-color: #23272b;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-weight: bold;
            color: #555;
        }

        .form-container .mb-3 {
            margin-bottom: 20px;
        }

        .form-container .form-control:focus,
        .form-container .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-container .form-control::placeholder {
            color: #888;
        }

        .form-container .btn-sm {
            width: auto;
            margin-top: 20px;
        }

        .form-container .form-select,
        .form-control {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <?php include '../views/navbar.php'; ?>

    <div class="container c">
        <div class="row py-2 justify-content-center h5">
            <h3 class="text-center">Create New Article</h3>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2 form-container">
                <!-- Formular pentru crearea articolului -->
                <form action="/articole/store" method="POST">
                    <div class="mb-3">
                        <label for="title">Article Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter article title"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="content">Article Content</label>
                        <textarea name="content" id="content" class="form-control" rows="6"
                            placeholder="Enter article content" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm">Save Article</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
