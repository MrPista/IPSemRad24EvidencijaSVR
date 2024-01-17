<?php
class Tabela
{

  // Atributi
  public $OtvorenaKonekcija; // Objekat za otvorenu konekciju na bazu
  public $NazivBazePodataka; // Naziv baze podataka
  public $NazivTabele; // Naziv tabele
  public $Kolekcija; // Rezultat upita kao kolekcija
  public $BrojZapisa; // Broj zapisa u kolekciji
  public $PrviRedZapisa; // Prvi red zapisa u kolekciji
  public $ListaZapisa; // Lista zapisa (array)


  // Metode

  // Konstruktor
  public function __construct($NovaOtvorenaKonekcija, $NoviNazivTabele)
  {
    // Konstruktor klase

    // Pretpostavljamo da je otvorena konekcija, a zatvara se spolja
    $this->OtvorenaKonekcija = $NovaOtvorenaKonekcija;
    $this->NazivBazePodataka = $NovaOtvorenaKonekcija->KompletanNazivBazePodataka;
    $this->NazivTabele = $NoviNazivTabele;
  }
  
  // Učitava sve zapise iz tabele i sortira ih po datom kriterijumu
  public function UcitajSve($KriterijumSortiranja)
  {
    $SQL = "SELECT * FROM `" . $this->NazivBazePodataka . "`.`" . $this->NazivTabele . "` ORDER BY " . $KriterijumSortiranja;

    $this->Kolekcija = mysqli_query($this->OtvorenaKonekcija->konekcijaDB, $SQL);
    $this->BrojZapisa = mysqli_num_rows($this->Kolekcija);
  }
  
  // Učitava sve zapise iz tabele na osnovu zadatog SQL upita
  public function UcitajSvePoUpitu($Upit)
  {
    $this->Kolekcija = mysqli_query($this->OtvorenaKonekcija->konekcijaDB, $Upit);
    $this->BrojZapisa = mysqli_num_rows($this->Kolekcija);
  }
  
  // Učitava sve zapise iz tabele na osnovu filtera i sortiranja
  public function UcitajSvaPoljaFiltrirano($KriterijumFiltriranja, $KriterijumSortiranja)
  {
    $SQL = "SELECT * FROM `" . $this->NazivBazePodataka . "`.`" . $this->NazivTabele . "` WHERE " . $KriterijumFiltriranja . " ORDER BY " . $KriterijumSortiranja;

    $this->Kolekcija = mysqli_query($this->OtvorenaKonekcija->konekcijaDB, $SQL);
    $this->BrojZapisa = mysqli_num_rows($this->Kolekcija);
  }
  
  // Učitava određena polja iz tabele na osnovu filtera i sortiranja
  public function UcitajPoljaFiltrirano($Polja, $KriterijumFiltriranja, $KriterijumSortiranja)
  {
    $SQL = "SELECT " . $Polja . " FROM `" . $this->NazivBazePodataka . "`.`" . $this->NazivTabele . "` WHERE " . $KriterijumFiltriranja . " ORDER BY " . $KriterijumSortiranja;

    $this->Kolekcija = mysqli_query($this->OtvorenaKonekcija->konekcijaDB, $SQL);
    $this->BrojZapisa = mysqli_num_rows($this->Kolekcija);
  }
  
  // Dohvata vrednost određenog polja prvog zapisa na osnovu filtera i sortiranja
  public function DajVrednostJednogPoljaPrvogZapisa($NazivTrazenogPolja, $KriterijumFiltriranja, $KriterijumSortiranja)
  {
    $SQL = "SELECT " . $NazivTrazenogPolja . " FROM `" . $this->NazivBazePodataka . "`.`" . $this->NazivTabele . "` WHERE " . $KriterijumFiltriranja . " ORDER BY " . $KriterijumSortiranja;

    $Kolekcija = mysqli_query($this->OtvorenaKonekcija->konekcijaDB, $SQL);
    $row = mysqli_fetch_array($Kolekcija, MYSQLI_NUM);
    $Vrednost = $row[0];

    return $Vrednost;
  }
  
  // Prebacuje kolekciju u listu i vraća je
  public function PrebaciKolekcijuUListu($Kolekcija)
  {
    $ListaZapisa = array();

    while ($RedZapisa = mysqli_fetch_array($Kolekcija, MYSQLI_NUM)) {
      $this->ListaZapisa[] = $RedZapisa;
    }

    return $ListaZapisa;
  }
  
  // Dohvata vrednost po rednom broju zapisa i rednom broju polja
  public function DajVrednostPoRednomBrojuZapisaPoRBPolja($Kolekcija, $RBZapisa, $RBPolja)
  {

    $ListaZapisa = array();
    $ListaZapisa = $this->PrebaciKolekcijuUListu($Kolekcija);
    $RedZapisa = $this->ListaZapisa[$RBZapisa];
    $Vrednost = $RedZapisa[$RBPolja];

    return $Vrednost;
  }
  
  // Proverava postojanje zapisa na osnovu filtera
  public function PostojiZapis($KriterijumFiltriranja)
  {
    // Ne puni kolekciju atribut, već samo lokalnu promenljivu kako bi vratio da li postoji zapis

    $SQL = "SELECT * FROM `" . $this->NazivBazePodataka . "`.`" . $this->NazivTabele . "` WHERE " . $KriterijumFiltriranja;

    $KolekcijaLokalna = mysqli_query($this->OtvorenaKonekcija->konekcijaDB, $SQL);
    $BrojZapisaLokalna = mysqli_num_rows($KolekcijaLokalna);

    if ($BrojZapisaLokalna > 0) {
      $postoji = true;
    } else {
      $postoji = false;
    }
    return $postoji;
  }
  
  // Izvršava aktivan SQL upit
  public function IzvrsiAktivanSQLUpit($AktivanSQLUpit)
  {

    $retval = mysqli_query($this->OtvorenaKonekcija->konekcijaDB, $AktivanSQLUpit);
    $Greska = mysqli_error($this->OtvorenaKonekcija->konekcijaDB);

    return $Greska;
  }
  
  // *************************************************************

}
