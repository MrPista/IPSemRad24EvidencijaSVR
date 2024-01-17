<?php
class DBVojniKandidat extends Tabela 
{
  // ATRIBUTI
  private $bazapodataka;
  private $UspehKonekcijeNaDBMS;
  //
  public $IDKandidata;
  public $ImeKandidata;
  public $PrezimeKandidata;
  public $DatumRodjenja;
  public $Prebivaliste;
  public $KontaktTelefon;
  public $OznakaVojnogCina;
  public $Napomena;

  // METODE

  // konstruktor

  // Dohvata kolekciju svih vojnih kandidata iz tabele
  public function DajKolekcijuSvihVojnihKandidata()
  {
    $SQL = "select * from `vojni_kandidat` ORDER BY kandidat_id ASC";
    $this->UcitajSvePoUpitu($SQL); // Puni atribut bazne klase Kolekcija
    return $this->Kolekcija; // Uzima iz bazne klase vrednost atributa
  }

  // Učitava kandidata po ID kandidata
  public function UcitajKandidataPoIDKandidata($IDKandidataParametar)
  {
    $SQL = "SELECT * FROM `vojni_kandidat` WHERE `kandidat_id`='" . $IDKandidataParametar . "'";
    $this->UcitajSvePoUpitu($SQL); // Puni atribut bazne klase Kolekcija
    // Raspolazemo sa:
    // $Kolekcija;
    // $BrojZapisa;
  }

  // Dodaje novog kandidata
  public function DodajNovogKandidata()
  {
    $SQL = "INSERT INTO `vojni_kandidat` (kandidat_id, ime_kandidata, prezime_kandidata, datum_rodjenja, prebivaliste, kontakt_telefon, vojni_cin_oznaka, napomena) VALUES ('$this->IDKandidata','$this->ImeKandidata','$this->PrezimeKandidata', '$this->DatumRodjenja', '$this->Prebivaliste', '$this->KontaktTelefon', '$this->OznakaVojnogCina', '$this->Napomena')";
    $greska = $this->IzvrsiAktivanSQLUpit($SQL);

    return $greska;
  }

  // Briše kandidata
  public function ObrisiKandidata($IdZaBrisanje)
  {
    $SQL = "DELETE FROM `vojni_kandidat` WHERE kandidat_id='" . $IdZaBrisanje . "'";
    $greska = $this->IzvrsiAktivanSQLUpit($SQL);

    return $greska;
  }

  // Izmenjuje kandidata
  public function IzmeniKandidata($StariIDKandidata, $NoviIDKandidata, $NovoImeKandidata, $NovoPrezimeKandidata, $NoviDatumRodjenja, $NovoPrebivaliste, $NoviKontaktTelefon, $NovaOznakaVojnogCina, $NovaNapomena)
  {
    $SQL = "UPDATE `vojni_kandidat` SET kandidat_id='" . $NoviIDKandidata . "', ime_kandidata='" . $NovoImeKandidata . "', prezime_kandidata='" . $NovoPrezimeKandidata . "', datum_rodjenja='" . $NoviDatumRodjenja . "', prebivaliste='" . $NovoPrebivaliste . "', kontakt_telefon='" . $NoviKontaktTelefon . "', vojni_cin_oznaka='" . $NovaOznakaVojnogCina . "', napomena='" . $NovaNapomena . "' WHERE kandidat_id='" . $StariIDKandidata . "'";
    $greska = $this->IzvrsiAktivanSQLUpit($SQL);

    return $greska;
  }

  // Ostale metode
}
?>
