<?php
class Transakcija
{

  // atributi
  private $OtvorenaKonekcija;
  // metode

  // ------- konstruktor
  public function __construct($NovaOtvorenaKonekcija)
  {
    $this->OtvorenaKonekcija = $NovaOtvorenaKonekcija;
  }

  public function ZapocniTransakciju()
  {
    mysqli_query($this->OtvorenaKonekcija->konekcijaDB, "SET AUTOCOMMIT=0");
    mysqli_query($this->OtvorenaKonekcija->konekcijaDB, "START TRANSACTION");
  } // zatvaranje procedure

  public function ProveriGresku()
  {
    return $greska = mysqli_error($this->OtvorenaKonekcija->konekcijaDB);
  } // zatvaranje procedure

  public function PonistiTransakciju()
  // samo ako poslednje izvrsavanje aktivnog SQL upita ima gresku
  //onda radi rollback
  {
    mysqli_query($this->OtvorenaKonekcija->konekcijaDB, "ROLLBACK");
  } // zatvaranje procedure


  public function ZavrsiTransakciju($UtvrdjenaGreska)
  // samo ako poslednje izvrsavanje aktivnog SQL upita ima gresku
  //onda radi rollback
  {

    if (empty($UtvrdjenaGreska)) {
      mysqli_query($this->OtvorenaKonekcija->konekcijaDB, "COMMIT");
    } else {
      mysqli_query($this->OtvorenaKonekcija->konekcijaDB, "ROLLBACK");
    }
  } // zatvaranje procedure

}  // zatvaranje klase
