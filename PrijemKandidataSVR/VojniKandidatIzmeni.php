 <?php

	session_start();
	// citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	$korisnik = $_SESSION["korisnik"];
	$status = $_SESSION["status"];

	// ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
	if (isset($korisnik) && $status === 'admin') {
		$NoviIDKandidata = $_POST['IDKandidata'];
		$StariIDKandidata = $_POST['StariIDKandidata'];
		$NovoImeKandidata = $_POST['imeKandidata'];
		$NovoPrezimeKandidata = $_POST['prezimeKandidata'];
		$NoviDatumRodjenja = $_POST['datumRodjenja'];
		$NovoPrebivaliste = $_POST['prebivaliste'];
		$NoviKontaktTelefon = $_POST['kontaktTelefon'];
		$NovaOznakaVojnogCina = $_POST['oznakaVojnogCina'];
		$NovaNapomena = $_POST['napomena'];

		if (isset($_POST['oznakaVojnogCina'])) {
			$NovaOznakaVojnogCina = $_POST['oznakaVojnogCina'];
		} else // ako nije nista promenjeno
		{
			$StaraOznakaVojnogCina = $_POST['staraOznakaVojnogCina'];
			$NovaOznakaVojnogCina = $StaraOznakaVojnogCina;
		}

		// koristimo klasu za poziv procedure za konekciju
		require "klase/BaznaKonekcija.php";
		require "klase/BaznaTabela.php";
		$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
		$KonekcijaObject->KonektujSe();
		if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
		{
			require "klase/DBVojniKandidat.php";
			$VojniKandidatObject = new DBVojniKandidat($KonekcijaObject, 'vojni_kandidat');
			$greska = $VojniKandidatObject->IzmeniKandidata($StariIDKandidata, $NoviIDKandidata, $NovoImeKandidata, $NovoPrezimeKandidata, $NoviDatumRodjenja, $NovoPrebivaliste, $NoviKontaktTelefon, $NovaOznakaVojnogCina, $NovaNapomena);
		} else {
			echo "Nije uspostavljena konekcija ka bazi podataka!";
		}

		$KonekcijaObject->DiskonektujSe();

		// prikaz uspeha aktivnosti	
		//echo "Ukupno procesirano $retval zapisa";
		//echo "Greska $greska";	

		header('Location:VojniKandidatLista.php');
	} else {
		header('Location:index.php');
	}

	?>

