<?php
$tours = json_decode(file_get_contents(__DIR__ . '/../data/tours.json'), true);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Turlar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="new_tour.php">Yeni Tur Ekle</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h1 class="mb-4">Turlar</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tur Adı</th>
                <th>Bölge</th>
                <th>Fiyat</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tours as $index => $tour): ?>
            <tr>
                <td><?php echo htmlspecialchars($tour['name']); ?></td>
                <td><?php echo htmlspecialchars($tour['region']); ?></td>
                <td><?php echo htmlspecialchars($tour['price']); ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="edit_tour.php?id=<?php echo $index; ?>">Düzenle</a>
                    <a class="btn btn-sm btn-danger" href="delete_tour.php?id=<?php echo $index; ?>" onclick="return confirm('Silinsin mi?');">Sil</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
