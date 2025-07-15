<?php
$id = $_GET['id'] ?? null;
$tours = json_decode(file_get_contents(__DIR__ . '/../data/tours.json'), true);
if ($id !== null && isset($tours[$id])) {
    array_splice($tours, $id, 1); // remove from array
    file_put_contents(__DIR__ . '/../data/tours.json', json_encode($tours, JSON_PRETTY_PRINT));
}
header('Location: tours.php');
exit;
