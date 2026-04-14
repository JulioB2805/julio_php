<?php
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['score'])) {
    $score = intval($data['score']);
    $file = 'scores.json';
    $scores = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $scores[] = $score;
    rsort($scores); // büyükten küçüğe sırala
    file_put_contents($file, json_encode(array_slice($scores, 0, 10)));
}
