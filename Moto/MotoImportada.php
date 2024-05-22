<?

include_once "./Moto.php";

class MotoImportada extends Moto
{
  private $impuesto_imp;
  private $pais_imp;

  public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncAnual, $activa, $impuesto_imp, $pais_imp)
  {
    parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncAnual, $activa);
    $this->impuesto_imp = $impuesto_imp;
    $this->pais_imp = $pais_imp;
  }
  public function getImpuestoImp()
  {
    return $this->impuesto_imp;
  }
  public function getPaisImp()
  {
    return $this->pais_imp;
  }

  public function setImpuestoImp($value)
  {
    $this->impuesto_imp = $value;
  }
  public function setPaisImp($value)
  {
    $this->pais_imp = $value;
  }
  public function darPrecioVenta()
  {
    $venta = parent::darPrecioVenta();
    if ($venta > 0) {
      $venta = $venta + $this->getImpuestoImp();
    }
    return $venta;
  }
  public function __toString()
  {

    $cadena = parent::__toString();
    $cadena .= "\n" . "Importada desde: " . $this->getPaisImp();
    $cadena .= "\n" . "Impuesto de importación: " . $this->getImpuestoImp();
  }
}
