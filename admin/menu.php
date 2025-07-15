<?php
$menuFile = __DIR__ . '/../data/menu.json';
$menus = file_exists($menuFile) ? json_decode(file_get_contents($menuFile), true) : [];

if (isset($_GET['delete'])) {
    $i = (int)$_GET['delete'];
    if (isset($menus[$i])) {
        array_splice($menus, $i, 1);
        file_put_contents($menuFile, json_encode($menus, JSON_PRETTY_PRINT));
    }
    header('Location: menu.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'add') {
        $menus[] = [
            'name' => $_POST['name'] ?? '',
            'link' => $_POST['link'] ?? '',
            'icon' => $_POST['icon'] ?? '',
        ];
        file_put_contents($menuFile, json_encode($menus, JSON_PRETTY_PRINT));
        header('Location: menu.php');
        exit;
    } elseif ($action === 'order') {
        $order = json_decode($_POST['order'] ?? '[]', true);
        if (is_array($order)) {
            $reordered = [];
            foreach ($order as $idx) {
                if (isset($menus[$idx])) {
                    $reordered[] = $menus[$idx];
                }
            }
            $menus = $reordered;
            file_put_contents($menuFile, json_encode($menus, JSON_PRETTY_PRINT));
        }
        header('Location: menu.php');
        exit;
    }
}

$pageTitle = 'Menü Ayarları';
include 'header.php';
?>
<h1 class="text-2xl font-bold mb-4">Menü Ayarları</h1>
<form method="post" class="space-y-2 mb-6">
  <input type="hidden" name="action" value="add">
  <div>
    <label class="block mb-1">Ad</label>
    <input type="text" name="name" class="border rounded w-full p-2" required>
  </div>
  <div>
    <label class="block mb-1">Link</label>
    <input type="text" name="link" class="border rounded w-full p-2" required>
  </div>
  <div>
    <label class="block mb-1">Icon (Font Awesome)</label>
    <input type="text" name="icon" class="border rounded w-full p-2" placeholder="fas fa-home">
  </div>
  <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Ekle</button>
</form>
<form method="post" id="orderForm">
  <input type="hidden" name="action" value="order">
  <input type="hidden" name="order" id="orderInput">
  <ul id="menuList" class="space-y-2">
  <?php foreach ($menus as $i => $item): ?>
    <li class="bg-white p-3 shadow rounded flex items-center justify-between" draggable="true" data-index="<?php echo $i; ?>">
      <div class="flex items-center space-x-2">
        <i class="<?php echo htmlspecialchars($item['icon']); ?>"></i>
        <span><?php echo htmlspecialchars($item['name']); ?></span>
        <span class="text-gray-500 text-sm"><?php echo htmlspecialchars($item['link']); ?></span>
      </div>
      <a href="?delete=<?php echo $i; ?>" class="text-red-600">Sil</a>
    </li>
  <?php endforeach; ?>
  </ul>
  <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded">Sıralamayı Kaydet</button>
</form>
<script>
const list = document.getElementById('menuList');
let dragged;
list.addEventListener('dragstart', e => {
  dragged = e.target;
  e.dataTransfer.effectAllowed = 'move';
});
list.addEventListener('dragover', e => {
  e.preventDefault();
  const target = e.target.closest('li');
  if (target && target !== dragged) {
    const rect = target.getBoundingClientRect();
    const next = (e.clientY - rect.top) / (rect.bottom - rect.top) > 0.5;
    list.insertBefore(dragged, next && target.nextSibling || target);
  }
});
document.getElementById('orderForm').addEventListener('submit', () => {
  const order = [];
  document.querySelectorAll('#menuList li').forEach(li => order.push(li.dataset.index));
  document.getElementById('orderInput').value = JSON.stringify(order);
});
</script>
<?php include 'footer.php'; ?>
