<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f4f8; /* Fundal mai deschis, pentru un look curat */
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Umbra subtilă pentru un efect modern */
            margin-bottom: 30px; /* Margine între carduri */
        }

        .card-body {
            padding: 25px;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #007bff; /* Bordură albastră pentru imaginea de profil */
            margin-bottom: 20px;
        }

        .profile-info h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
        }

        .profile-info p {
            color: #888;
            font-size: 1rem;
        }

        .btn-custom {
            width: 48%;
            padding: 12px;
            margin-top: 15px;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-custom-primary {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-custom-primary:hover {
            background-color: #0056b3;
        }

        .btn-custom-secondary {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-custom-secondary:hover {
            background-color: #218838;
        }

        .table th {
            background-color: #343a40;
            color: white;
        }

        .table td {
            background-color: #f8f9fa;
        }

        .table td, .table th {
            padding: 15px;
        }
        
    </style>
</head>
<body>
    <?php include '../views/navbar.php'; ?>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Profil Card -->
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" alt="Profile Image" class="profile-img">
                        <h3 class="profile-info"><?= htmlspecialchars($user->nume) ?></h3>
                        <p class="text-muted"><?= htmlspecialchars($user->email) ?></p>
                    </div>
                </div>

                <!-- Informatii Profil -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile Information</h5>
                        <table class="table">
                            <tr>
                                <th>First Name:</th>
                                <td><?= htmlspecialchars($user->nume) ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?= htmlspecialchars($user->email) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
