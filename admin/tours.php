<?php
$tours = json_decode(file_get_contents(__DIR__ . '/../data/tours.json'), true);
$pageTitle = 'Turlar';
include 'header.php';
?>
<h1 class="text-2xl font-bold mb-4">Turlar</h1>
<table class="min-w-full bg-white shadow rounded">
  <thead>
    <tr>
      <th class="py-2 px-4 border-b">Tur Adı</th>
      <th class="py-2 px-4 border-b">Bölge</th>
      <th class="py-2 px-4 border-b">Fiyat</th>
      <th class="py-2 px-4 border-b">İşlemler</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($tours as $index => $tour): ?>
    <tr class="hover:bg-gray-50">
      <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($tour['name']); ?></td>
      <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($tour['region']); ?></td>
      <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($tour['price']); ?></td>
      <td class="py-2 px-4 border-b space-x-2">
        <a class="text-blue-600" href="edit_tour.php?id=<?php echo $index; ?>">Düzenle</a>
        <a class="text-red-600" href="delete_tour.php?id=<?php echo $index; ?>" onclick="return confirm('Silinsin mi?');">Sil</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php include 'footer.php'; ?>
