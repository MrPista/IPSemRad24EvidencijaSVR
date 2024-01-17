 <?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   
	   
	      // -------------------------------------

	   
	   // preuzimanje vrednosti sa forme
	  	$IDKandidata = $_POST['IDKandidata'];
		$ImeKandidata = $_POST['imeKandidata'];
		$PrezimeKandidata = $_POST['prezimeKandidata'];
		$DatumRodjenja = $_POST['datumRodjenja'];
		$Prebivaliste = $_POST['prebivaliste'];
		$KontaktTelefon = $_POST['kontaktTelefon'];
		$OznakaVojnogCina = $_POST['oznakaVojnogCina'];
		$Napomena = $_POST['napomena'];
	   
	   //KONEKCIJA KA SERVERU
	
// koristimo klasu za poziv procedure za konekciju
	require "klase/BaznaKonekcija.php";
	require "klase/BaznaTabela.php";
	$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
	$KonekcijaObject->KonektujSe();

	if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
    {	

		require "klase/DBVojniKandidat.php";
		$VojniKandidatObject = new DBVojniKandidat($KonekcijaObject, 'vojni_kandidat');
		$VojniKandidatObject->IDKandidata=$IDKandidata;
		$VojniKandidatObject->ImeKandidata=$ImeKandidata;
		$VojniKandidatObject->PrezimeKandidata=$PrezimeKandidata;
		$VojniKandidatObject->DatumRodjenja=$DatumRodjenja;
		$VojniKandidatObject->Prebivaliste=$Prebivaliste;
		$VojniKandidatObject->KontaktTelefon=$KontaktTelefon;
		$VojniKandidatObject->OznakaVojnogCina=$OznakaVojnogCina;
		$VojniKandidatObject->Napomena=$Napomena;
		
		require "klase/UnosKandidata.php";
		$UnosKandidataObject = new Unos($KonekcijaObject, 'vojni_kandidat');
    	$dozvoljenUpis = $UnosKandidataObject->DaLiSmeDaSeUneseKandidat($DatumRodjenja,$OznakaVojnogCina);

		switch ($dozvoljenUpis[0]) {
			case "DA":
				// Ako zadovoljava uslov
				$greska1 = $VojniKandidatObject->DodajNovogKandidata();
				break;
			case "NE":
				// Ako ne zadovoljava uslov
				switch ($dozvoljenUpis[1]) {
					case "MLADJI": 		//slučaj kad je kandidat mlađi od minimalnog uzrasta
						$UtvrdjenaGreska = "Kандидат не може бити унешен јер није достигао минимални узраст за овај војни чин";
						break;
					case "STARIJI":		//slučaj kad je kandidat stariji od maksimalnog uzrasta
						$UtvrdjenaGreska = "Кандидат не може бити унешен јер превазилази максимални узраст за овај војни чин";
						break;
					}
				}
		} // od if db selected

      // ZATVARANJE KONEKCIJE KA DBMS
	  $KonekcijaObject->DiskonektujSe();
	
	// prikaz uspeha aktivnosti	
	
	if ($UtvrdjenaGreska!=null) {
		echo "<span style='color: red;'>$UtvrdjenaGreska</span>";	
  }	
	 else
	 {
		//echo "Snimljeno!";	
		header ('Location:VojniKandidatLista.php');	
	 }
		
	 
	  
      ?>

