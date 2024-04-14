<?php

class Cliente
{
  private $nombre;
  private $apellido;
  private $baja;
  private $tipoDoc;
  private $nroDoc;

  public function __construct($nombre, $apellido, $tipoDoc, $nroDoc)
  {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->baja = false;
    $this->tipoDoc = $tipoDoc;
    $this->nroDoc = $nroDoc;
  }

  // getters
  public function getNombre()
  {
    return $this->nombre;
  }
  public function getApellido()
  {
    return $this->apellido;
  }
  public function getBaja()
  {
    return $this->baja;
  }
  public function getTipoDoc()
  {
    return $this->tipoDoc;
  }
  public function getNroDoc()
  {
    return $this->nroDoc;
  }
  //setters
  public function setNombre($nuevoNombre)
  {
    $this->nombre = $nuevoNombre;
  }
  public function setApellido($nuevoApellido)
  {
    $this->apellido = $nuevoApellido;
  }
  public function setBaja()
  {
    $this->baja = !$this->getBaja();
  }
  public function setTipoDoc($nuevoTipoDoc)
  {
    $this->tipoDoc = $nuevoTipoDoc;
  }
  public function setNroDoc($nuevoNroDoc)
  {
    $this->nroDoc = $nuevoNroDoc;
  }

  public function __toString()
  {
    return "Nombre y Apellido: "
      . $this->getNombre()
      . " "
      . $this->getApellido()
      . "\n"
      . "Documento: "
      . $this->getTipoDoc()
      . " "
      . $this->getNroDoc()
      . ".\n"
      . $this->getBaja() ? "El cliente está dado de baja" : "El cliente no está dado de baja";
  }
}
