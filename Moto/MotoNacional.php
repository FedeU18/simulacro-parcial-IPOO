<?

include_once "./Moto.php";

class MotoImportada extends Moto
{
  private $porc_descuento;

  public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncAnual, $activa, $porc_descuento)
  {
    parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncAnual, $activa);
    $this->porc_descuento = $porc_descuento ?? 15;
  }
  public function getPorcDescuento()
  {
    return $this->porc_descuento;
  }

  public function setPorcDescuento($value)
  {
    $this->porc_descuento = $value;
  }

  public function darPrecioVenta()
  {
    $venta = parent::darPrecioVenta();
    if ($venta > 0) {
      $venta = $venta - (($venta * $this->getPorcDescuento()) / 100);
    }
    return $venta;
  }

  public function __toString()
  {

    $cadena = parent::__toString();
    $cadena .= "\n" . "Descuento: " . $this->getPorcDescuento();
  }
}
