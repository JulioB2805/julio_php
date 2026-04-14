<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Tetris Modern</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Skor Tablosu</h2>
            <ul id="highScores"></ul>
            <button onclick="startGame()">Başlat</button>
            <button onclick="pauseGame()">Durdur</button>
            <p>Skor: <span id="score">0</span></p>
        </div>
        <div class="game-area">
            <h1>TETRIS</h1>
            <canvas id="tetris" width="240" height="400"></canvas>
        </div>
    </div>
    <script src="tetris.js"></script>
</body>
</html>
