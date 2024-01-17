<?php
class DBVojniKandidat extends Tabela 
{
  // METODE

  // konstruktor

  // Dohvata sve podatke o vojnim kandidatima sa ili bez filtera
  public function DajSvePodatkeOVojnimKandidatima($filterParametar)
  {
    if (isset($filterParametar)) {
      // Možete dodati filter nad pogledom jer se koristi kao da je tabela
      $upit = "select * from `" . $this->NazivBazePodataka . "`.`SviPodaciVojnihKandidata` where `kandidat_id`='" . $filterParametar . "'";
    } else {
      $upit = "select * from `" . $this->NazivBazePodataka . "`.`SviPodaciVojnihKandidata`";
    }
    $this->UcitajSvePoUpitu($upit);
    // Sada raspoložete sa:
    // $this->Kolekcija 
    // $this->BrojZapisa
  }
}
?>
