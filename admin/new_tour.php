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
$pageTitle = 'Yeni Tur';
include 'header.php';
?>
<h1 class="text-2xl font-bold mb-4">Yeni Tur Ekle</h1>
<form method="post" class="grid grid-cols-1 md:grid-cols-3 gap-4">
  <div>
    <label class="block mb-1">Tur Adı</label>
    <input type="text" name="name" class="border rounded w-full p-2" required>
  </div>
  <div>
    <label class="block mb-1">Bölge</label>
    <input type="text" name="region" class="border rounded w-full p-2" required>
  </div>
  <div>
    <label class="block mb-1">Fiyat</label>
    <input type="text" name="price" class="border rounded w-full p-2" required>
  </div>
  <div class="md:col-span-3">
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Kaydet</button>
  </div>
</form>
<?php include 'footer.php'; ?>
