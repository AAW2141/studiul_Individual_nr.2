<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sections Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            color: #495057;
        }

        .navbar {
            background-color: #343a40;
            height: 70px; /* Setează o înălțime fixă pentru navbar */
        }

        .navbar-brand, .nav-link {
            color: #fff;
            font-weight: 600;
        }

        .navbar-nav .nav-link:hover {
            color: #17a2b8;
        }

        .navbar-toggler-icon {
            background-color: #fff; /* Culoarea butonului de meniu pe mobil */
        }

        .container {
            max-width: 1200px;
        }

        .card {
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: 600;
        }

        .card-body {
            background-color: #ffffff;
            padding: 20px;
        }

        .btn-custom {
            background-color: #17a2b8;
            color: white;
            border-radius: 5px;
            padding: 10px 15px;
            text-decoration: none;
        }

        .btn-custom:hover {
            background-color: #138496;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
        }

        /* Navbar links responsive */
        .navbar-nav .nav-item {
            padding: 0 15px;
        }

        .nav-item .btn {
            margin-left: 10px;
        }

        /* Navbar links custom color */
        .nav-item .btn-outline-light:hover,
        .nav-item .btn-light:hover {
            background-color: #17a2b8;
            color: white;
        }
        .navbar {
            position: fixed; /* Fixează navbar-ul în partea de sus */
            top: 0; /* Lipește-l de partea de sus a paginii */
            left: 0; /* Asigură-te că este aliniat la stânga */
            width: 100%; /* Lăsa-l să ocupe toată lățimea ecranului */
            z-index: 1000; /* Plasează-l deasupra altor elemente */
        }
        
        body {
            padding-top: 70px; 
        }
        /* Responsivitate pe mobil */
        @media (max-width: 767px) {
            .navbar-nav {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/" style="font-size: 1.5rem;">NewsDay</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/sections">Sections</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sections/create">Create Section</a>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a href="/users/profile/<?= $_SESSION['user_id'] ?>" class="btn btn-outline-light">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="/users/logout" class="btn btn-outline-danger ms-2">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/users/login" class="btn btn-outline-light">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/users/register" class="btn btn-light ms-2">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
