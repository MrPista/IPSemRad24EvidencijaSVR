<?php
session_start();
       $loginUserName=$_POST['korisnicko_ime'];
       $loginPassword=$_POST['lozinka'];

	// zato sto se prilikom require uradi copy paste u ovaj fajl, 
// onda se putanja do parametra gleda u odnosu na lokaciju ovog fajla 
require 'klase/BaznaKonekcija.php';
require 'klase/BaznaTabela.php';
require 'klase/DBKorisnik.php';

$korisnik='NEPOZNAT KORISNIK';
$objKonekcija = new Konekcija('klase/BaznaParametriKonekcije.xml');
$objKonekcija->KonektujSe();
if ($objKonekcija->konekcijaDB)
    {	
		$objKorisnik = new DBKorisnik($objKonekcija, 'korisnik');
		$postojiKorisnik=$objKorisnik->DaLiPostojiKorisnik($loginUserName,$loginPassword);
		if ($postojiKorisnik=="DA")
		{
			// rad sa sesijama
			$_SESSION["prez"] = $objKorisnik->DajPrezimePrijavljenogKorisnika($loginUserName,$loginPassword);
			$_SESSION["ime"] = $objKorisnik->DajImePrijavljenogKorisnika($loginUserName,$loginPassword);
			$_SESSION["idkorisnika"] = $objKorisnik->DajIDPrijavljenogKorisnika($loginUserName,$loginPassword);
			$_SESSION["korisnik"] = $objKorisnik->DajImePrezimePrijavljenogKorisnika($loginUserName,$loginPassword);
			$_SESSION["status"] = $objKorisnik->DajStatusPrijavljenogKorisnika($loginUserName,$loginPassword);
			// ucitavanje pocetne personalizovane stranice
			header ('Location:Welcome.php');	
		}
		else
		{
			// neuspeh izaziva ponovo ucitavanje stranice za prijavu
			header ('Location:prijava.php');	
		}
	}
	else
	{
		echo "Neuspeh konekcije na bazu podataka!";
	}
	
?>
