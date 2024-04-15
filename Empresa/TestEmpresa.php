<?php

include_once "../Moto/Moto.php";
include_once "../Cliente/Cliente.php";
include_once "../Venta/Venta.php";
include_once "./Empresa.php";

$objCliente1 = new Cliente("Bob", "Esponja", "DNI", 12123123);
$objCliente2 = new Cliente("Patricio", "Estrella", "DNI", 23234234);

$obMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$obMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.70, true);
$obMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false);

$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2], [$obMoto1, $obMoto2, $obMoto3]);

echo "Resultado 1er venta: " . $objEmpresa->registrarVenta([11, 12, 13], $objEmpresa->getColClientes()[1]) . "\n\n";
echo "Resultado 2da venta: " . $objEmpresa->registrarVenta([0], $objEmpresa->getColClientes()[1]) . "\n\n";
echo "Resultado 3ra venta: " . $objEmpresa->registrarVenta([2], $objEmpresa->getColClientes()[1]) . "\n\n";

$objEmpresa->retornarVentasXCliente("DNI", 12123123);
$objEmpresa->retornarVentasXCliente("DNI", 23234234);

echo $objEmpresa;
