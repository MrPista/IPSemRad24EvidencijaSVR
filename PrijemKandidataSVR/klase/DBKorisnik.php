<?php
class DBKorisnik extends Tabela
{

  // ATRIBUTI
  public $IDKorisnika; // Auto increment u bazi podataka
  public $KorisnickoIme;
  public $Lozinka;
  public $Ime;
  public $Prezime;
  public $Email;
  public $StatusUcesca;
  public $Stari_IDKorisnika; // Potrebno zbog izmene

  // METODE

  // ------- konstruktor - uzima se iz klase roditelja - Tabela

  // ------- preostale metode

  // Učitava sve korisnike iz tabele
  public function UcitajSveKorisnike()
  {
    $SQL = "SELECT * FROM korisnik";
    $this->UcitajSvePoUpitu($SQL);
  } // kraj metode

  // Proverava da li postoji korisnik sa datim korisničkim imenom i lozinkom
  public function DaLiPostojiKorisnik($loginusername, $loginpassword)
  {
    $postoji = "";
    $SQLKorisnik = "SELECT * FROM `" . $this->OtvorenaKonekcija->KompletanNazivBazePodataka . "`.`korisnik` WHERE korisnicko_ime='" . $loginusername . "' AND lozinka='" . $loginpassword . "'";
    $this->UcitajSvePoUpitu($SQLKorisnik);
    // Raspolazemo sa kolekcijom i brojem zapisa nakon ucitaj sve po upitu

    if ($this->BrojZapisa > 0) {
      $postoji = "DA";
    } else {
      $postoji = "NE";
    }
    return $postoji;
  }

  // Dohvata ime prijavljenog korisnika na osnovu korisničkog imena i lozinke
  public function DajImePrijavljenogKorisnika($loginusername, $loginpassword)
  {
    $ime = "";
    $SQLKorisnik = "SELECT * FROM `" . $this->OtvorenaKonekcija->KompletanNazivBazePodataka . "`.`korisnik` WHERE korisnicko_ime='" . $loginusername . "' AND lozinka='" . $loginpassword . "'";
    $this->UcitajSvePoUpitu($SQLKorisnik);
    $this->PrebaciKolekcijuUListu($this->Kolekcija);
    if ($this->BrojZapisa > 0) {
      // Postoji zapis
      foreach ($this->ListaZapisa as $VrednostCvoraListe) {
        $ime = $VrednostCvoraListe[2];
      }
    } else {
      $ime = 'NEPOZNAT KORISNIK';
    }
    return $ime;
  }

  // Dohvata prezime prijavljenog korisnika na osnovu korisničkog imena i lozinke
  public function DajPrezimePrijavljenogKorisnika($loginusername, $loginpassword)
  {
    $korisnik = "";
    $SQLKorisnik = "SELECT * FROM `" . $this->OtvorenaKonekcija->KompletanNazivBazePodataka . "`.`korisnik` WHERE korisnicko_ime='" . $loginusername . "' AND lozinka='" . $loginpassword . "'";
    $this->UcitajSvePoUpitu($SQLKorisnik);
    $this->PrebaciKolekcijuUListu($this->Kolekcija);
    if ($this->BrojZapisa > 0) {
      // Postoji zapis
      foreach ($this->ListaZapisa as $VrednostCvoraListe) {
        $korisnik = $VrednostCvoraListe[1];
      }
    } else {
      $korisnik = 'NEPOZNAT KORISNIK';
    }
    return $korisnik;
  }

  // Dohvata ime i prezime prijavljenog korisnika na osnovu korisničkog imena i lozinke
  public function DajImePrezimePrijavljenogKorisnika($loginusername, $loginpassword)
  {
    $korisnik = "";
    $SQLKorisnik = "SELECT * FROM `" . $this->OtvorenaKonekcija->KompletanNazivBazePodataka . "`.`korisnik` WHERE korisnicko_ime='" . $loginusername . "' AND lozinka='" . $loginpassword . "'";
    $this->UcitajSvePoUpitu($SQLKorisnik);
    $this->PrebaciKolekcijuUListu($this->Kolekcija);
    if ($this->BrojZapisa > 0) {
      // Postoji zapis
      foreach ($this->ListaZapisa as $VrednostCvoraListe) {
        $prez = $VrednostCvoraListe[3];
        $ime = $VrednostCvoraListe[4];
        $korisnik = $prez . ' ' . $ime;
      }
    } else {
      $korisnik = 'NEPOZNAT KORISNIK';
    }
    return $korisnik;
  }

  // Dohvata ID prijavljenog korisnika na osnovu korisničkog imena i lozinke
  public function DajIDPrijavljenogKorisnika($loginusername, $loginpassword)
  {
    $id = 0;
    $SQLKorisnik = "SELECT * FROM `" . $this->OtvorenaKonekcija->KompletanNazivBazePodataka . "`.`korisnik` WHERE korisnicko_ime='" . $loginusername . "' AND lozinka='" . $loginpassword . "'";
    $this->UcitajSvePoUpitu($SQLKorisnik);
    $this->PrebaciKolekcijuUListu($this->Kolekcija);
    if ($this->BrojZapisa > 0) {
      // Postoji zapis
      foreach ($this->ListaZapisa as $VrednostCvoraListe) {
        $id = $VrednostCvoraListe[0];
      }
    }
    // else - ostaje 0

    return $id;
  }

  // Dohvata status prijavljenog korisnika na osnovu korisničkog imena i lozinke
  public function DajStatusPrijavljenogKorisnika($loginusername, $loginpassword)
  {
    $korisnik = "";
    $SQLKorisnik = "SELECT * FROM `" . $this->OtvorenaKonekcija->KompletanNazivBazePodataka . "`.`korisnik` WHERE korisnicko_ime='" . $loginusername . "' AND lozinka='" . $loginpassword . "'";
    $this->UcitajSvePoUpitu($SQLKorisnik);
    $this->PrebaciKolekcijuUListu($this->Kolekcija);
    if ($this->BrojZapisa > 0) {
      // Postoji zapis
      foreach ($this->ListaZapisa as $VrednostCvoraListe) {
        $korisnik = $VrednostCvoraListe[7];
      }
    } else {
      $korisnik = 'NEPOZNAT KORISNIK';
    }
    return $korisnik;
  }

  public function SnimiNovo()
  {
    $AktivanSQLUpit = "";
    $this->IzvrsiAktivanSQLUpit($AktivanSQLUpit);
  }

  // Brisanje korisnika
  public function Obrisi()
  {
    $AktivanSQLUpit = "DELETE FROM ";
    $this->IzvrsiAktivanSQLUpit($AktivanSQLUpit);
  }

  // Brisanje svih korisnika
  public function ObrisiSve()
  {
    $AktivanSQLUpit = "DELETE FROM ";
    $this->IzvrsiAktivanSQLUpit($AktivanSQLUpit);
  }

  // Izmena vrednosti polja
  public function IzmeniVrednostPolja()
  {

    // transformisemo datum u formu pogodnu za insert into 
    // $DatumskaVrednost=date_create($this->Datum_PoslednjePromene);
    // $DatumUnosa=date_format($DatumskaVrednost,"Y-m-d");  

    // konacan upit
    $AktivanSQLUpit = "UPDATE  SET ";
    $this->IzvrsiAktivanSQLUpit($AktivanSQLUpit);
  } // kraj metode
} // kraj klase
?>
