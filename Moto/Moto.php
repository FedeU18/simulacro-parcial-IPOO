<?php

class Moto
{
  private $codigo;
  private $costo;
  private $anioFabricacion;
  private $descripcion;
  private $porcIncAnual;
  private $activa;

  public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncAnual, $activa)
  {
    $this->codigo = $codigo;
    $this->costo = $costo;
    $this->anioFabricacion = $anioFabricacion;
    $this->descripcion = $descripcion;
    $this->porcIncAnual = $porcIncAnual;
    $this->activa = $activa;
  }
  //getters
  public function getCodigo()
  {
    return $this->codigo;
  }
  public function getCosto()
  {
    return $this->costo;
  }
  public function getAnioFabricacion()
  {
    return $this->anioFabricacion;
  }
  public function getDescripcion()
  {
    return $this->descripcion;
  }
  public function getPorcIncAnual()
  {
    return $this->porcIncAnual;
  }
  public function getActiva()
  {
    return $this->activa;
  }
  //setters
  public function setCodigo($nuevoCodigo)
  {
    $this->codigo = $nuevoCodigo;
  }
  public function setCosto($nuevoCosto)
  {
    $this->costo = $nuevoCosto;
  }
  public function setAnioFabricacion($nuevoAnioFabricacion)
  {
    $this->anioFabricacion = $nuevoAnioFabricacion;
  }
  public function setDescripcion($nuevoDescripcion)
  {
    $this->descripcion = $nuevoDescripcion;
  }
  public function setPorcIncAnual($nuevoPorcIncAnual)
  {
    $this->porcIncAnual = $nuevoPorcIncAnual;
  }
  public function setActiva()
  {
    $this->activa = !$this->getActiva();
  }

  /**
   * calcula el valor por el cual puede ser vendida una moto.
   * @return float
   */
  public function darPrecioVenta()
  {
    $venta = -1;
    if ($this->getActiva()) {

      $compra = $this->getCosto();
      $anioFabricacion = $this->getAnioFabricacion();
      $porcIncAnual = $this->getPorcIncAnual();

      $anioActual = date("Y");

      $anio = $anioActual - $anioFabricacion;

      $venta = $compra + $compra * ($anio * $porcIncAnual);
    }

    return $venta;
  }


  public function __toString()
  {
    return "Código de la moto: "
      . $this->getCodigo()
      . "\n"
      . "Costo: "
      . $this->getCosto()
      . "\n"
      . "Descripcion: "
      . $this->getDescripcion()
      . "\n"
      . "Año de fabricación: "
      . $this->getAnioFabricacion()
      . "\n"
      . $this->getActiva() ? "La moto está activa" : "La moto no está activa por el momento";
  }
}
