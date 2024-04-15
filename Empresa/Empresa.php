<?php

class Empresa
{
  private $denominacion;
  private $direccion;
  private $colClientes;
  private $colMotos;
  private $colVentas;

  public function __construct($denominacion, $direccion, $colClientes, $colMotos)
  {
    $this->denominacion = $denominacion;
    $this->direccion = $direccion;
    $this->colClientes = $colClientes;
    $this->colMotos = $colMotos;
    $this->colVentas = [];
  }
  //getters
  public function getDenominacion()
  {
    return $this->denominacion;
  }
  public function getDireccion()
  {
    return $this->direccion;
  }
  public function getColClientes()
  {
    return $this->colClientes;
  }
  public function getColMotos()
  {
    return $this->colMotos;
  }
  public function getColVentas()
  {
    return $this->colVentas;
  }
  //setters
  public function setDenominacion($nuevaDenominacion)
  {
    $this->denominacion = $nuevaDenominacion;
  }
  public function setDireccion($nuevaDireccion)
  {
    $this->direccion = $nuevaDireccion;
  }
  public function setColClientes($nuevaColClientes)
  {
    $this->colClientes = $nuevaColClientes;
  }
  public function setColMotos($nuevaColMotos)
  {
    $this->colMotos = $nuevaColMotos;
  }
  public function setColVentas($nuevaColVentas)
  {
    $this->colVentas = $nuevaColVentas;
  }

  /**
   * recorre la colección de motos de la empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro
   * @param int $codigoMoto
   * @return Moto|null
   */
  public function retornarMoto($codigoMoto)
  {
    $i = 0;
    $colMotos = $this->getColMotos();
    $encontrada = false;
    $motoEncontrada = null;
    while ($i < count($colMotos) && !$encontrada) {
      if ($colMotos[$i]->getCodigo() == $codigoMoto) {
        $encontrada = true;
        $motoEncontrada = $colMotos[$i];
      }
      $i++;
    }

    return $motoEncontrada;
  }

  /**
   * registra una venta
   * @param array $colCodigosMoto
   * @param Cliente $objCliente
   * @return float
   */
  public function registrarVenta($colCodigosMoto, $objCliente)
  {
    $precioFinalVenta = -1;
    if (!$objCliente->getBaja()) {
      $colMotosEncontradas = [];
      for ($i = 0; $i < count($colCodigosMoto); $i++) {
        $motoPorAgregar = $this->retornarMoto($colCodigosMoto[$i]);
        if (is_object($motoPorAgregar)) {
          $colMotosEncontradas[] = $motoPorAgregar;
        }
      }
      if (count($colMotosEncontradas) != 0) {
        $objVenta = new Venta(count($this->getColVentas()), $objCliente);
        for ($i = 0; $i < count($colMotosEncontradas); $i++) {
          $objVenta->incorporarMoto($colMotosEncontradas[$i]);
        }
        $colVentas = $this->getColVentas();
        $colVentas[] = $objVenta;
        $this->setColVentas($colVentas);
        $precioFinalVenta = $objVenta->getPrecioFinal();
      }
    }
    return $precioFinalVenta;
  }

  /**
   * recibe tipo y nro de documento de un Cliente y retorna una colección con las ventas realizadas por dicho cliente
   * @param string $tipo
   * @param int $numDoc
   * @return array
   */
  public function retornarVentasXCliente($tipo, $numDoc)
  {
    $colVentasXCliente = [];
    $colVentas = $this->getColVentas();

    for ($i = 0; $i < count($colVentas); $i++) {
      if ($colVentas[$i]->getObjCliente()->getTipoDoc() == $tipo && $colVentas[$i]->getObjCliente()->getNroDoc() == $numDoc) {
        $colVentasXCliente[] = $colVentas[$i];
      }
    }
    return $colVentasXCliente;
  }

  public function __toString()
  {
    return "Denominación: "
      . $this->getDenominacion()
      . "\n"
      . "Dirección: "
      . $this->getDireccion()
      . "\n"
      . "Cantidad de clientes: "
      . count($this->getColClientes())
      . "\n"
      . "Cantidad de motos: "
      . count($this->getColMotos())
      . "\n"
      . "Cantidad de ventas realizadas: "
      . count($this->getColVentas());
  }
}
