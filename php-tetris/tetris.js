const canvas = document.getElementById('tetris');
const context = canvas.getContext('2d');
context.scale(20, 20);

let arena = createMatrix(12, 20);
let player = { pos: {x: 0, y: 0}, matrix: null, score: 0 };
let dropCounter = 0, dropInterval = 1000;
let lastTime = 0;
let isPaused = true;

function createMatrix(w, h) {
    const matrix = [];
    while (h--) matrix.push(new Array(w).fill(0));
    return matrix;
}

function update(time = 0) {
    if (isPaused) return;
    const deltaTime = time - lastTime;
    lastTime = time;
    dropCounter += deltaTime;
    if (dropCounter > dropInterval) {
        playerDrop();
    }
    draw();
    requestAnimationFrame(update);
}

function draw() {
    context.fillStyle = '#111827';
    context.fillRect(0, 0, canvas.width, canvas.height);
    drawMatrix(arena, {x:0, y:0});
    drawMatrix(player.matrix, player.pos);
}

function drawMatrix(matrix, offset) {
    matrix.forEach((row, y) =>
        row.forEach((value, x) => {
            if (value !== 0) {
                context.fillStyle = '#facc15';
                context.fillRect(x + offset.x, y + offset.y, 1, 1);
            }
        })
    );
}

function startGame() {
    if (isPaused) {
        isPaused = false;
        update();
    }
}

function pauseGame() {
    isPaused = true;
}

function updateScore() {
    document.getElementById('score').innerText = player.score;
}

function playerDrop() {
    player.pos.y++;
    if (collide(arena, player)) {
        player.pos.y--;
        merge(arena, player);
        playerReset();
        arenaSweep();
        updateScore();
    }
    dropCounter = 0;
}

function playerReset() {
    const pieces = 'ILJOTSZ';
    player.matrix = createPiece(pieces[Math.floor(Math.random() * pieces.length)]);
    player.pos.y = 0;
    player.pos.x = (arena[0].length / 2 | 0) - (player.matrix[0].length / 2 | 0);
    if (collide(arena, player)) {
        saveHighScore(player.score);
        arena.forEach(row => row.fill(0));
        player.score = 0;
        updateScore();
    }
}

function saveHighScore(score) {
    fetch('save_score.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({score})
    }).then(loadHighScores);
}

function loadHighScores() {
    fetch('scores.json')
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('highScores');
            list.innerHTML = '';
            data.slice(0, 5).forEach(s => {
                const li = document.createElement('li');
                li.textContent = `Skor: ${s}`;
                list.appendChild(li);
            });
        });
}

document.addEventListener('keydown', e => {
    if (isPaused) return;
    if (e.key === 'ArrowLeft') playerMove(-1);
    else if (e.key === 'ArrowRight') playerMove(1);
    else if (e.key === 'ArrowDown') playerDrop();
    else if (e.key === 'q') playerRotate(-1);
    else if (e.key === 'w') playerRotate(1);
});

function playerMove(dir) {
    player.pos.x += dir;
    if (collide(arena, player)) {
        player.pos.x -= dir;
    }
}

function playerRotate(dir) {
    rotate(player.matrix, dir);
}

function rotate(matrix, dir) {
    for (let y = 0; y < matrix.length; ++y)
        for (let x = 0; x < y; ++x)
            [matrix[x][y], matrix[y][x]] = [matrix[y][x], matrix[x][y]];
    if (dir > 0) matrix.forEach(row => row.reverse());
    else matrix.reverse();
}

function merge(arena, player) {
    player.matrix.forEach((row, y) => {
        row.forEach((val, x) => {
            if (val !== 0) arena[y + player.pos.y][x + player.pos.x] = val;
        });
    });
}

function collide(arena, player) {
    const [m, o] = [player.matrix, player.pos];
    for (let y = 0; y < m.length; ++y)
        for (let x = 0; x < m[y].length; ++x)
            if (m[y][x] !== 0 && (arena[y + o.y] && arena[y + o.y][x + o.x]) !== 0)
                return true;
    return false;
}

function arenaSweep() {
    let rowCount = 1;
    outer: for (let y = arena.length - 1; y >= 0; --y) {
        if (arena[y].every(val => val !== 0)) {
            arena.splice(y, 1);
            arena.unshift(new Array(arena[0].length).fill(0));
            player.score += rowCount * 10;
            rowCount *= 2;
        }
    }
}

function createPiece(type) {
    switch (type) {
        case 'T': return [[0,1,0],[1,1,1],[0,0,0]];
        case 'O': return [[1,1],[1,1]];
        case 'L': return [[0,0,1],[1,1,1],[0,0,0]];
        case 'J': return [[1,0,0],[1,1,1],[0,0,0]];
        case 'I': return [[0,0,0,0],[1,1,1,1],[0,0,0,0]];
        case 'S': return [[0,1,1],[1,1,0],[0,0,0]];
        case 'Z': return [[1,1,0],[0,1,1],[0,0,0]];
    }
}

playerReset();
updateScore();
loadHighScores();
