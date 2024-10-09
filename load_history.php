<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tictactoe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch game history
$sql = "SELECT winner, date FROM game_history ORDER BY date DESC";
$result = $conn->query($sql);

$history = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $history[] = $row;
    }
}

// Fetch win counts
$xWins = 0;
$oWins = 0;
$sql = "SELECT player, count FROM win_counts";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row['player'] == 'X') {
            $xWins = $row['count'];
        } elseif ($row['player'] == 'O') {
            $oWins = $row['count'];
        }
    }
}

$response = [
    'history' => $history,
    'xWins' => $xWins,
    'oWins' => $oWins
];

echo json_encode($response);

$conn->close();
?>
