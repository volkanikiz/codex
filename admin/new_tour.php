<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tours = json_decode(file_get_contents(__DIR__ . '/../data/tours.json'), true);
    $newTour = [
        'name' => $_POST['name'] ?? '',
        'region' => $_POST['region'] ?? '',
        'price' => $_POST['price'] ?? '',
    ];
    $tours[] = $newTour;
    file_put_contents(__DIR__ . '/../data/tours.json', json_encode($tours, JSON_PRETTY_PRINT));
    header('Location: tours.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Yeni Tur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="tours.php">Turlar</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h1 class="mb-4">Yeni Tur Ekle</h1>
    <form method="post" class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Tur Adı</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Bölge</label>
            <input type="text" name="region" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Fiyat</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
