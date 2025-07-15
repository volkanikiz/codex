<?php
$tours = json_decode(file_get_contents(__DIR__ . '/../data/tours.json'), true);
$totalTours = count($tours);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="tours.php">Turlar</a></li>
                <li class="nav-item"><a class="nav-link" href="new_tour.php">Yeni Tur Ekle</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <p>Toplam Tur Sayısı: <?php echo $totalTours; ?></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
