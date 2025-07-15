<?php
$id = $_GET['id'] ?? null;
$tours = json_decode(file_get_contents(__DIR__ . '/../data/tours.json'), true);
if ($id === null || !isset($tours[$id])) {
    header('Location: tours.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tours[$id]['name'] = $_POST['name'] ?? '';
    $tours[$id]['region'] = $_POST['region'] ?? '';
    $tours[$id]['price'] = $_POST['price'] ?? '';
    file_put_contents(__DIR__ . '/../data/tours.json', json_encode($tours, JSON_PRETTY_PRINT));
    header('Location: tours.php');
    exit;
}
$tour = $tours[$id];
$pageTitle = 'Tur Düzenle';
include 'header.php';
?>
<h1 class="text-2xl font-bold mb-4">Tur Düzenle</h1>
<form method="post" class="grid grid-cols-1 md:grid-cols-3 gap-4">
  <div>
    <label class="block mb-1">Tur Adı</label>
    <input type="text" name="name" class="border rounded w-full p-2" value="<?php echo htmlspecialchars($tour['name']); ?>" required>
  </div>
  <div>
    <label class="block mb-1">Bölge</label>
    <input type="text" name="region" class="border rounded w-full p-2" value="<?php echo htmlspecialchars($tour['region']); ?>" required>
  </div>
  <div>
    <label class="block mb-1">Fiyat</label>
    <input type="text" name="price" class="border rounded w-full p-2" value="<?php echo htmlspecialchars($tour['price']); ?>" required>
  </div>
  <div class="md:col-span-3">
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Kaydet</button>
  </div>
</form>
<?php include 'footer.php'; ?>
