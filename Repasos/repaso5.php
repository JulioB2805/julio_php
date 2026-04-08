<?php
//Ejercicio 5: POO - Sistema de productos y ventas
declare(strict_types=1);

class Producto{
    public function __construct(public string $nombre, public float $precio) {}
    public function getPrecioFinal(): float { return $this->precio * 1.10; }
}

class ProductoAlimenticio extends Producto{
    public function getPrecioFinal(): float { return $this->precio; } //Sin IVA
}

class Cliente {
    public function __construct(public string $nombre, public float $descuento) {}
}

class Venta {
    public function __construct(private Cliente $cliente, private array $productos){}

    public function calcularTotal():float {
        $total = arrray_reduce($this->productos, fn($sum, $p)=> $sum + $p->getPrecioFinal(), 0);
        return $total * (1 - $this->cliente->descuento / 100);
    }
}

$cliente = new Cliente("Fiorella Aguero", 10);
$productos = [new Producto ("Laptop", 4500000), new ProductoAlimenticio("Arroz", 8500)];
$venta = new Venta($cliente, $productos);
echo "Total venta: Gs. " . number_format($venta->calcularTotal(), 0, ',', '.') . "\n";
