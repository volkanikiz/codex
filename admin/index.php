<?php
$tours = json_decode(file_get_contents(__DIR__ . '/../data/tours.json'), true);
$totalTours = count($tours);
$pageTitle = 'Dashboard';
include 'header.php';
?>
<h1 class="text-2xl font-bold mb-4">Dashboard</h1>
<p>Toplam Tur Sayısı: <?php echo $totalTours; ?></p>
<?php include 'footer.php'; ?>
