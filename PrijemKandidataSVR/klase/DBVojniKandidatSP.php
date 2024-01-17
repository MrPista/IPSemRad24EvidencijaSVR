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

  // Dodaje novog vojnog kandidata koristeći stored proceduru
  public function DodajNovogKandidata()
  {
    $GreskaRezultatPar1 = $this->IzvrsiAktivanSQLUpit("SET @kandidat_id_param='" . $this->IDKandidata . "'");
    $GreskaRezultatPar2 = $this->IzvrsiAktivanSQLUpit("SET @ime_kandidata_param='" . $this->ImeKandidata . "'");
    $GreskaRezultatPar3 = $this->IzvrsiAktivanSQLUpit("SET @prezime_kandidata_param='" . $this->PrezimeKandidata . "'");
    $GreskaRezultatPar4 = $this->IzvrsiAktivanSQLUpit("SET @datum_rodjenja_param='" . $this->DatumRodjenja . "'");
    $GreskaRezultatPar5 = $this->IzvrsiAktivanSQLUpit("SET @prebivaliste_param='" . $this->Prebivaliste . "'");
    $GreskaRezultatPar6 = $this->IzvrsiAktivanSQLUpit("SET @kontakt_telefon_param='" . $this->KontaktTelefon . "'");
    $GreskaRezultatPar7 = $this->IzvrsiAktivanSQLUpit("SET @vojni_cin_oznaka_param='" . $this->OznakaVojnogCina . "'");
    $GreskaRezultatPar8 = $this->IzvrsiAktivanSQLUpit("SET @napomena_param='" . $this->Napomena . "'");
    $GreskaRezultatCall = $this->IzvrsiAktivanSQLUpit("CALL `DodajVojnogKandidata`(@kandidat_id_param,@ime_kandidata_param,@prezime_kandidata_param,@datum_rodjenja_param,@prebivaliste_param,@kontakt_telefon_param,@vojni_cin_oznaka_param,@napomena_param);");

    $greska = $GreskaRezultatPar1 . $GreskaRezultatPar2 . $GreskaRezultatPar3 . $GreskaRezultatPar4 . $GreskaRezultatPar5 . $GreskaRezultatPar6 . $GreskaRezultatPar7 . $GreskaRezultatPar8 . $GreskaRezultatCall;
    return $greska;
  }
}
?>
