<?php

include_once "../Moto/Moto.php";
include_once "../Cliente/Cliente.php";
include_once "./Venta.php";

$objMoto = new Moto(123, 321, 2010, "una motaza", 1.50, true);
$objCliente = new Cliente("Bob", "Esponja", "DNI", 12123123);
$objVenta = new Venta(1, $objCliente);

$objVenta->incorporarMoto($objMoto);

print_r($objVenta->getColObjMotos());

echo $objVenta;
