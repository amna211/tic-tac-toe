<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tic Tac Toe</title>
    <style>
        /* Animation for the winning message */
/* Confetti animation */
@keyframes confetti {
    0% { transform: translateY(0) rotate(0); }
    100% { transform: translateY(100vh) rotate(720deg); }
}

.confetti-piece {
    position: fixed;
    width: 10px;
    height: 20px;
    top: -20px;
    animation: confetti 3s linear infinite;
    opacity: 0.8;
}


        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: black;
            font-family: cursive;
            color: #4682b4;
            
        }
        .title {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .title h1 {
            margin: 0 10px; /* Adjust spacing between words */
            color: #4682b4;
        }
        
        #game {
            text-align: center;
            background-color: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color:ff6347
        }

        #board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            gap: 10px;
            margin: 0 auto;
            color: wheat;
        }

        .cell {
            position: relative;
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            cursor: pointer;
            border: 2px solid #333;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.2s;
            background-color: #fff;
            overflow: hidden;
        }

        .cell.x::before {
            content: 'X';
            font-size: 60px;
            color: #ff6347; 
            position: absolute;
            transform: rotate(-15deg);
        }
       
        .cell.o::before {
            content: 'O';
            font-size: 60px;
            color: #4682b4; 
            position: absolute;
        }

        .cell:hover {
            background-color: #f9f9f9;
            transform: scale(1.05);
        }

        #status {
            margin-top: 20px;
            font-size: 24px;
            color: white;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: white;
            color: black;
            transition: background-color 0.3s;
            font-family:cursive
        }

        button:hover {
            background-color: #555;
        }

        #winCounts {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-top: 20px;
        }

       
        #xWins{
            color: #ff6347;
            font-size: 24px;
        }
        #oWins{
            color:#4682b4;
            font-size: 24px;
        }
        #tic{
            color: #ff6347
        }
    </style>
</head>
<body>
    <div id="game">
    <div class="title">
            <h1>Tic</h1>
            <h1 id="tic">Tac</h1>
            <h1>Toe</h1>
        </div>

        <div id="board">
            <div class="cell" data-cell></div>
            <div class="cell" data-cell></div>
            <div class="cell" data-cell></div>
            <div class="cell" data-cell></div>
            <div class="cell" data-cell></div>
            <div class="cell" data-cell></div>
            <div class="cell" data-cell></div>
            <div class="cell" data-cell></div>
            <div class="cell" data-cell></div>
        </div>
        <div id="status"></div>
        <button id="restart">New Game</button>
        <div id="winCounts">
            <div id="xWins">X Wins: 0</div>
            <div id="oWins">O Wins: 0</div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
