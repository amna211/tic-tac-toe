# Tic Tac Toe Game

## Overview
This is a classic Tic Tac Toe game implemented with HTML, CSS, JavaScript, PHP, and MySQL. It features a game board, status updates, win tracking, and animated confetti effects to celebrate wins.

## Features
- **Play against another player**: Take turns placing X and O on a 3x3 grid.
- **Win or Draw Detection**: Automatically detects if a player wins or if the game is a draw.
- **Confetti Animation**: Celebrates the winner with animated confetti in the winner's color.
- **Win Tracking**: Keeps track of wins for both X and O, using PHP and MySQL for data storage.

## Technologies Used
- **HTML/CSS**: For the structure and styling of the game.
- **JavaScript**: For game logic, animations, and user interactions.
- **PHP**: To handle server-side operations such as saving and loading game history.
- **MySQL**: For storing and retrieving win counts.

## Setup
1. **Server Setup**: Ensure you have a local server setup (e.g., XAMPP, WAMP) to run PHP and MySQL.
2. **Database Configuration**: Create a MySQL database and import the necessary tables. Update your PHP files with the correct database connection details.
3. **Open `index.php`**: Navigate to `index.php` in your web browser to start playing the game.

## How It Works
- **Game Initialization**: On page load or restart, the game sets up the board and resets all cells.
- **Player Moves**: Players click on cells to place their marks. The game checks for a win or draw after each move.
- **Win Detection**: The game checks predefined winning combinations. If a player wins, confetti is displayed.
- **Draw Detection**: If all cells are filled without a winner, the game announces a draw.
- **Confetti Animation**: When a player wins, confetti in the winner's color falls from the top of the screen.

