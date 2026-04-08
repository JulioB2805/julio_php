<?php 
// Ejercicio 1: Operadores - calculo de precio con IVA Paraguay
declare(strict_types=1);

$producto = "Laptop HP";
$precio = 550000; // Guaranies
$descuento = 10; // porcentaje
$stock = 15;

//Operaciones aritmeticas
$precioDescuento = $precio - ($precio * $descuento / 100);
$iva = $precioDescuento * 0.10; // IVA 10% Paraguay
$precioFinal = $precioDescuento + $iva;

// Operadores de comparacion y logicos
$stockBajo = $stock < 20;
$precioAlto = $precioFinal > 5000000;
$necesitaPromocion = $stockBajo && $precioAlto;

echo "Producto: $producto\n";
echo "Precio final: Gs. ". number_format($precioFinal, 0,',','.') . "\n";
echo "¿Necesita promocion? ". ($necesitaPromocion ? "SI" : "NO") . "\n";
