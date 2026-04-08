<?php
// Ejercicio 3: Arrays y bucles - Inventario de productos
declare(strict_types=1);

$producto = [
    ["nombre" => "Arroz 1kg","precio" => 8500, "stock" => 50],
    ["nombre" => "Aceite 900ml","precio" => 1800, "stock" => 30],
    ["nombre" => "Azucar 1kg","precio" => 6500, "stock" => 45]
];

echo " === INVENTARIO ===\n";
for ($i = 0; $i < count($productos); $i++) {
    echo ($i+1) . ". {$productos[$i]['nombre']} - ";
    echo "Gs. " . number_format($productos['precio'], 0, ',', '.') . " - ";
    echo "Stock: {$productos[$i]['stock']}\n";
}

echo "\n=== PRODUCTOS CON STOCK BAJO ===\n";
foreach ($productos as $prod) {
    if ($prod['stock'] < 40) {
        echo "{$prod['nombre']} - Solo {$prod['stock']} unidades\n";
    }
}

