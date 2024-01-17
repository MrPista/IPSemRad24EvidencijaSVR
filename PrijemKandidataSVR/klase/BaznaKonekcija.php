<?php
class Konekcija
{

  // ATRIBUTI
  public $konekcijaMYSQL;   // Objekat za konekciju na DBMS (MySQL)
  public $konekcijaDB;      // Objekat za konekciju na konkretnu bazu podataka
  public $KompletanNazivBazePodataka; // Kompletan naziv baze podataka sa prefiksom
  public $VerzijaMYSQLNaredbi; // Verzija MySQL naredbi (mysql ili mysqli)
  //
  private $PutanjaNazivFajlaXMLParametriKonekcije;
  // Parametri konekcije
  private $host; // Adresa servera baze podataka
  private $korisnik; // Korisničko ime za pristup bazi podataka
  private $sifra; // Lozinka za pristup bazi podataka
  private $prefiks_baze_podataka; // Prefiks baze podataka (za hosting)
  private $naziv_baze_podataka; // Naziv same baze podataka


  // METODE
  // *************************************************************

  // *************************************************************
  private function UcitajParametreKonekcije($PutanjaNazivFajlaXMLParametriKonekcije)
  {
    // Učitava parametre konekcije iz XML konfiguracionog fajla

    $xml = simplexml_load_file($PutanjaNazivFajlaXMLParametriKonekcije) or die("Greska: Ne postoji fajl BaznaParametriKonekcije.xml");
    // Očitavanje elemenata XML fajla u promenljive
    $this->host = $xml->host;
    $this->korisnik = $xml->korisnik;
    $this->sifra = $xml->sifra;

    $this->prefiks_baze_podataka = $xml->prefiks_baze_podataka;
    $this->naziv_baze_podataka = $xml->naziv_baze_podataka;
    $this->KompletanNazivBazePodataka = $this->prefiks_baze_podataka . $this->naziv_baze_podataka;
  }

  // *************************************************************
  // ------- konstruktor
  public function __construct($NovaPutanjaNazivFajlaXMLParametriKonekcije)
  {
    // Konstruktor klase

    $this->PutanjaNazivFajlaXMLParametriKonekcije = $NovaPutanjaNazivFajlaXMLParametriKonekcije;
    $this->UcitajParametreKonekcije($NovaPutanjaNazivFajlaXMLParametriKonekcije);
  }

  // *************************************************************
  public function KonektujSe()
  {
    // Vrši konekciju na bazu podataka koristeći parametre iz XML konfiguracionog fajla

    $this->konekcijaDB = mysqli_connect($this->host, $this->korisnik, $this->sifra, $this->KompletanNazivBazePodataka);

    if ($this->konekcijaDB) {
      mysqli_set_charset($this->konekcijaDB, "utf8");
    }
  } // zatvaranje procedure


  public function DiskonektujSe()
  {
    // Diskonektuje se sa baze podataka

    mysqli_close($this->konekcijaDB);
  }

  public function UspehKonekcijeNaBazuPodataka() {
    // Proverava da li je konekcija na bazu podataka uspešna.

    // Pokušaj konekcije na bazu podataka
    $mysqli = new mysqli($this->host, $this->korisnik, $this->sifra, $this->KompletanNazivBazePodataka);
  
    // Proveri da li je konekcija uspešna
    if ($mysqli->connect_error) {
        // Konekcija nije uspela
        return false;
    } else {
        // Konekcija je uspela
        return true;
    }
  }

}  // zatvaranje klase
