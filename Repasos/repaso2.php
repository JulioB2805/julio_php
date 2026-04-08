<?php
// Ejercitario 2: if/else y switch - Categorizacion de cliente
declare(strict_types=1);

$cliente = "Juan Perez";
$montoCompra = 250000;
$tipoPago = "efectivo"; //efectivo, tarjeta, transferencia

// If-else para descuento por monto
if ($montoCompra >= 3000000){
    $descuento = 15;
}elseif ($montoCompra >= 1500000){
    $descuento = 10;
}else {
    $descuento = 5;
}

//
//

$total = $montoCompra * (1 - $descuento/100) * (1 + $ajuste/100);
echo "Cliente: $cliente\n";
echo "Total a pagar: Gs. " . number_format($total, 0,',' , '.') . "\n";
