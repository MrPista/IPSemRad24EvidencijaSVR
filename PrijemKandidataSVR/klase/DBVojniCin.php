<?php
class DBVojniCin extends Tabela
{
  // ATRIBUTI
  private $bazapodataka;
  private $UspehKonekcijeNaDBMS;
  //
  public $Oznaka;
  public $Naziv;
  public $Obrazovanje;
  public $Opis;

  // METODE

  // konstruktor

  // Učitava kolekciju svih vojnih činova iz tabele
  public function UcitajKolekcijuSvihCinova()
  {
    $SQL = "SELECT * FROM `vojni_cin` ORDER BY naziv ASC";
    $this->UcitajSvePoUpitu($SQL); // Puni atribut bazne klase Kolekcija
  }


  // Dohvata kolekciju vojnih činova filtriranu na osnovu zadatih kriterijuma
  public function DajKolekcijuCinovaFiltrirano($filterPolje, $filterVrednost, $nacinFiltriranja, $Sortiranje)
  {
    if ($nacinFiltriranja == "like") {
      $SQL = "SELECT * FROM `vojni_cin` WHERE $filterPolje LIKE '%" . $filterVrednost . "%' ORDER BY $Sortiranje";
    } else {
      $SQL = "SELECT * FROM `vojni_cin` WHERE $filterPolje ='" . $filterVrednost . "' ORDER BY $Sortiranje";
    }
    $this->UcitajSvePoUpitu($SQL);
    return $this->Kolekcija; // Uzima iz bazne klase vrednost atributa
  }
}
?>
