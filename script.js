const cells = document.querySelectorAll('[data-cell]');
const status = document.getElementById('status');
const restartButton = document.getElementById('restart');
let xTurn = true;
let gameActive = true; // Flag to check if the game is active

const winningCombinations = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];

function startGame() {
    xTurn = true;
    gameActive = true; // Set game to active when starting
    cells.forEach(cell => {
        cell.classList.remove('x');
        cell.classList.remove('o');
        cell.textContent = '';
        cell.removeEventListener('click', handleClick); // Remove previous event listener if any
        cell.addEventListener('click', handleClick, { once: true }); // Add event listener for new game
    });
    setStatus();
    loadHistory();
}

function handleClick(e) {
    if (!gameActive) return; // Ignore clicks if the game is not active

    const cell = e.target;
    const currentClass = xTurn ? 'x' : 'o';
    placeMark(cell, currentClass);
    if (checkWin(currentClass)) {
        endGame(false); // End game with a win
    } else if (isDraw()) {
        endGame(true); // End game with a draw
    } else {
        swapTurns();
        setStatus();
    }
}

function placeMark(cell, currentClass) {
    cell.classList.add(currentClass);
    cell.textContent = currentClass.toUpperCase();
}

function swapTurns() {
    xTurn = !xTurn;
}

function setStatus() {
    status.innerText = xTurn ? "X's turn" : "O's turn";
}

function checkWin(currentClass) {
    return winningCombinations.some(combination => {
        return combination.every(index => {
            return cells[index].classList.contains(currentClass);
        });
    });
}

function isDraw() {
    return [...cells].every(cell => {
        return cell.classList.contains('x') || cell.classList.contains('o');
    });
}

function endGame(draw) {
    let winner = '';
    if (draw) {
        status.innerText = "It's a Draw!";
        winner = 'D';
    } else {
        status.innerText = `${xTurn ? "X" : "O"} Wins!`;
        winner = xTurn ? 'X' : 'O';
    }
    gameActive = false; // Set game to inactive after end
    saveGame(winner);
    disableClicks(); // Disable further clicks

    // Only show confetti if there's a winner
    if (!draw) {
        showConfetti(winner);
    }
}

function saveGame(winner) {
    fetch('save_game.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ winner })
    }).then(() => loadHistory());
}

function loadHistory() {
    fetch('load_history.php')
        .then(response => response.json())
        .then(data => {
            const xWinsDiv = document.getElementById('xWins');
            const oWinsDiv = document.getElementById('oWins');

            xWinsDiv.innerText = `X Wins: ${data.xWins}`;
            oWinsDiv.innerText = `O Wins: ${data.oWins}`;
        });
}

function disableClicks() {
    cells.forEach(cell => {
        cell.removeEventListener('click', handleClick); // Remove click event listeners to prevent further interaction
    });
}

function showConfetti(winner) {
    // Define the colors based on the winner
    const colors = winner === 'X' ? ['#ff6347'] : ['#4682b4'];

    // Generate confetti pieces
    for (let i = 0; i < 100; i++) {
        const confettiPiece = document.createElement('div');
        confettiPiece.classList.add('confetti-piece');
        confettiPiece.style.left = `${Math.random() * 100}vw`;
        confettiPiece.style.width = `${Math.random() * 10 + 5}px`;
        confettiPiece.style.height = `${Math.random() * 20 + 10}px`;
        confettiPiece.style.animationDuration = `${Math.random() * 3 + 2}s`;
        confettiPiece.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        document.body.appendChild(confettiPiece);
        setTimeout(() => confettiPiece.remove(), 3000);
    }
}

restartButton.addEventListener('click', startGame);

startGame();
