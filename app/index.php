<?php
require_once "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Notes Management App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center" style="min-height:100vh;">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0">

                <div class="card-body text-center p-5">

                    <h1 class="display-4 mb-3">
                        🐳 Docker Notes Management App
                    </h1>

                    <p class="lead text-muted">
                        A Dockerized Notes Management System built with
                        <strong>PHP, MySQL, Nginx & Docker Compose</strong>.
                    </p>

                    <div class="alert alert-success mt-4">
                        ✅ Database Connected Successfully
                    </div>

                    <div class="mt-4">

                        <a href="auth/register.php" class="btn btn-primary btn-lg me-2">
                            Register
                        </a>

                        <a href="auth/login.php" class="btn btn-success btn-lg">
                            Login
                        </a>

                    </div>

                    <hr class="my-4">

                    <div class="row">

                        <div class="col-md-4">
                            <h5>🐳 Docker</h5>
                            <small>Multi-Container Setup</small>
                        </div>

                        <div class="col-md-4">
                            <h5>🐘 PHP</h5>
                            <small>Backend Application</small>
                        </div>

                        <div class="col-md-4">
                            <h5>🗄️ MySQL</h5>
                            <small>Database Storage</small>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>