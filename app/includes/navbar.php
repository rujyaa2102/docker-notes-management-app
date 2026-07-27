<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow mb-4">

    <div class="container">

        <a class="navbar-brand fw-bold" href="../dashboard/dashboard.php">
            📝 Docker Notes App
        </a>

        <?php if (isset($_SESSION['fullname'])) : ?>

            <span class="navbar-text text-white">
                Welcome,
                <strong><?= htmlspecialchars($_SESSION['fullname']); ?></strong>
            </span>

        <?php endif; ?>

    </div>

</nav>