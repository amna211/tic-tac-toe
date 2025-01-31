<?php
include 'db.php';

$stmt = $pdo->query('SELECT * FROM games ORDER BY id DESC LIMIT 1');
$game = $stmt->fetch();
echo json_encode(json_decode($game['board'], true));
?>
<?php
include 'db.php';

$stmt = $pdo->query('SELECT * FROM games ORDER BY id DESC LIMIT 1');
$game = $stmt->fetch();
echo json_encode(json_decode($game['board'], true));
?>