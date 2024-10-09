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

// Get the JSON input
$input = json_decode(file_get_contents('php://input'), true);
$winner = $input['winner'];
$date = date('Y-m-d H:i:s');

// Insert the game result into the database
$sql = "INSERT INTO game_history (winner, date) VALUES ('$winner', '$date')";
if ($conn->query($sql) === TRUE) {
    // Update win counts
    if ($winner == 'X') {
        $conn->query("UPDATE win_counts SET count = count + 1 WHERE player = 'X'");
    } elseif ($winner == 'O') {
        $conn->query("UPDATE win_counts SET count = count + 1 WHERE player = 'O'");
    }
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
