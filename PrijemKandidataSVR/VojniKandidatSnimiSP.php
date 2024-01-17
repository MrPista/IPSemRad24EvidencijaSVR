 <?php
        
	    
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
		//echo "USPESNA KONEKCIJA";
		require "klase/BaznaTransakcija.php";
		$TransakcijaObject = new Transakcija($KonekcijaObject);
		$TransakcijaObject->ZapocniTransakciju();
		
		require "klase/DBVojniKandidatSP.php";
		$VojniKandidatObject = new DBVojniKandidat($KonekcijaObject, 'vojni_kandidat');
		$VojniKandidatObject->IDKandidata=$IDKandidata;
		$VojniKandidatObject->ImeKandidata=$ImeKandidata;
		$VojniKandidatObject->PrezimeKandidata=$PrezimeKandidata;
		$VojniKandidatObject->DatumRodjenja=$DatumRodjenja;
		$VojniKandidatObject->Prebivaliste=$Prebivaliste;
		$VojniKandidatObject->KontaktTelefon=$KontaktTelefon;
		$VojniKandidatObject->OznakaVojnogCina=$OznakaVojnogCina;
		$VojniKandidatObject->Napomena=$Napomena;
		$greska1=$VojniKandidatObject->DodajNovogKandidata();
		
		$UtvrdjenaGreska=$greska1;
		$TransakcijaObject->ZavrsiTransakciju($UtvrdjenaGreska);
        	
		} // od if db selected

      // ZATVARANJE KONEKCIJE KA DBMS
	  $KonekcijaObject->DiskonektujSe();
	
	// prikaz uspeha aktivnosti	
	
	if ($UtvrdjenaGreska) {
	echo "Greska $UtvrdjenaGreska";	
     }	
	 else
	 {
		//echo "Snimljeno!";	
		header ('Location:VojniKandidatLista.php');		
	 }
		
	  
      ?>

