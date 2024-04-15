<?php

class Venta
{
  private $nro;
  private $fecha;
  private $objCliente;
  private $colObjMotos;
  private $precioFinal;

  public function __construct($nro, $objCliente)
  {
    $this->nro = $nro;
    $this->fecha = date("d/m/Y");
    $this->objCliente = $objCliente;
    $this->colObjMotos = [];
    $this->precioFinal = 0;
  }
  //getters
  public function getNro()
  {
    return $this->nro;
  }
  public function getFecha()
  {
    return $this->fecha;
  }
  public function getObjCliente()
  {
    return $this->objCliente;
  }
  public function getColObjMotos()
  {
    return $this->colObjMotos;
  }
  public function getPrecioFinal()
  {
    return $this->precioFinal;
  }
  //setters
  public function setNro($nuevoNro)
  {
    $this->nro =  $nuevoNro;
  }
  public function setFecha($nuevaFecha)
  {
    $this->fecha = $nuevaFecha;
  }
  public function setColObjMotos($nuevoColObjMotos)
  {
    $this->colObjMotos = $nuevoColObjMotos;
  }
  public function setPrecioFinal($nuevoPrecioFinal)
  {
    $this->precioFinal =  $nuevoPrecioFinal;
  }

  /**
   * recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta siempre y cuando sea posible
   * @param Moto $objMoto
   * @return boolean
   */
  public function incorporarMoto($objMoto)
  {
    $precioVentaMoto = $objMoto->darPrecioVenta();
    $colMotos = $this->getColObjMotos();
    $seAgregoLaMoto = false;
    if ($precioVentaMoto > 0) {
      $precioFinalVenta = $this->getPrecioFinal() + $precioVentaMoto;
      $this->setPrecioFinal($precioFinalVenta);
      $colMotos[] = $objMoto;
      $this->setColObjMotos($colMotos);
      $seAgregoLaMoto = true;
    }
    return $seAgregoLaMoto;
  }

  public function __toString()
  {
    return "Número de venta: "
      . $this->getNro()
      . "\n"
      . "La venta se realizó en la fecha: "
      . $this->getFecha()
      . "\n"
      . "A el precio final de: "
      . $this->getPrecioFinal()
      . "\n"
      . "Se vendieron esta cantidad de motos: "
      . count($this->getColObjMotos())
      . "\n"
      . "A el cliente: "
      . $this->getObjCliente();
  }
}
