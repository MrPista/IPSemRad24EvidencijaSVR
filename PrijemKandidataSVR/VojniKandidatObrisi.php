 <?php

	session_start();
	// citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	$korisnik = $_SESSION["korisnik"];

	// ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
	if (!isset($korisnik)) {
		header('Location:index.php');
	}

	// preuzimanje vrednosti sa forme
	$IdZaBrisanje = $_POST['IDKandidata'];

	// koristimo klasu za poziv procedure za konekciju
	require "klase/BaznaKonekcija.php";
	require "klase/BaznaTabela.php";
	$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
	$KonekcijaObject->KonektujSe();
	if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
	{
		require "klase/DBVojniKandidat.php";
		$VojniKandidatObject = new DBVojniKandidat($KonekcijaObject, 'vojni_kandidat');
		$greska = $VojniKandidatObject->ObrisiKandidata($IdZaBrisanje);
	}

	$KonekcijaObject->DiskonektujSe();

	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header('Location:VojniKandidatLista.php');


	?>

