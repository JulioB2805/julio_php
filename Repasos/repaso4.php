<?php 
// Ejercicio 4: Funciones - Sistema de facturacion
declare(strict_types=1);

function calcularIVA(float $monto): float{
    return $monto * 0.10;
}

function aplicarDescuento(float $monto, string $categoria): float{
    $desc = match($categoria){
        "VIP" => 0.12,
        "PREMIUM" => 0.12,
        default => 0.05
    };
    return $monto * (1 - $desc);
}

function formatearGuaranies(float $monto): string {
    return "Gs. " . number_format($monto, 0,',','.');
}

$subtotal = 1500000;
$categoria = "PREMIUM";
$montoConDesc = aplicarDescuento($subtotal, $categoria);
$total = $montoConDesc + calcularIVA($montoConDesc);

echo "Subtotal: " . formatearGuaranies($subtotal) . "\n";
echo "Total: " . formatearGuaranies($total) . "\n";
