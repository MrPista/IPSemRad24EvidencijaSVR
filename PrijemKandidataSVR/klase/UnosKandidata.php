<?php



class Unos extends Tabela
{
  // ATRIBUTI
  private $bazapodataka;
  private $UspehKonekcijeNaDBMS;
  //
  // METODE

  // konstruktor nasledjuje od bazne klase Tabela

  public function DaLiSmeDaSeUneseKandidat($DatumRodjenja, $OznakaVojnogCina)
  {

    $xml = simplexml_load_file("klase/" . $OznakaVojnogCina . ".xml") or die("Nije uspešno učitavanje fajla sa ograničenjem!"); //Učitavanje XML-a na osnovu vojnog čina
    $maxGodina = $xml->MaksimalnoGodina; 
    $minGodina = $xml->MinimalnoGodina;

    $TrenutniDatum = new DateTime();
    $DatumRodjenja = new DateTime($DatumRodjenja);
    $godine = $TrenutniDatum->diff($DatumRodjenja)->y; //Poredi današnji datum sa datumom rođenja vojnog kandidata

    if ($godine < $minGodina) {
      return array("NE", "MLADJI"); // Kandidat je mlađi od minimalnog uzrasta
  } elseif ($godine > $maxGodina) {
      return array("NE", "STARIJI"); // Kandidat je stariji od maksimalnog uzrasta
  } else {
      return array("DA", ""); // Kandidat je u dozvoljenom uzrastu
    }

  }  
}
