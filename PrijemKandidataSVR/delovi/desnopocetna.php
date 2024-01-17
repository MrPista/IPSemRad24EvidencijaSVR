
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;"width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#cbe3f7">

<tr>
<td style="width:5%;">
</td>

<td>
<font face="Trebuchet MS" color="darkblue" size="4px">
<b>СПИСАК ВОЈНИХ КАНДИДАТА</br> </font>
<form action="" method="GET">
ИД ВОЈНОГ КАНДИДАТА: <input type="text" name="filter" />
<input type="submit" name="filtriraj" value="FILTRIRAJ" />
<input type="submit" name="svi" value="SVI" />

</form>


</td>

<td style="width:5%;">
</td>
</tr>


<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<font face="Trebuchet MS" color="darkblue" size="4px">

<?php
// PRETHODNI KOD PREUZIMA PODATKE I TO JE NA INDEX.PHP

if ($VojniKandidatViewObject->BrojZapisa==0)
	{
		echo "НЕМА ЗАПИСА У ТАБЕЛИ!";
	}
else
	{
	echo "УКУПАН БРОЈ ЗАПИСА:".$VojniKandidatViewObject->BrojZapisa;
		// ------------ zaglavlje ----------------
		echo "<table style=\"width:90%; padding:0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\"  bgcolor=\"#D8E7F4\">";
		echo "<tr>";
		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ИД КАНДИДАТА</font><br/>";
		echo "</td>";
		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ИМЕ</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ПРЕЗИМЕ</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ДАТУМ РОЂЕЊА</font><br/>";
		echo "</td>";
		echo "<td style=\"width:20%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ПРЕБИВАЛИШТЕ</font><br/>";
		echo "</td>";
		echo "<td style=\"width:50%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">КОНТАКТ ТЕЛЕФОН</font><br/>";
		echo "</td>";
		echo "<td style=\"width:50%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">ВОЈНИ ЧИН</font><br/>";
		echo "</td>";
		echo "<td style=\"width:50%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">НАПОМЕНА</font><br/>";
		echo "</td>";
		echo "</tr>";

		for ($RBZapisa = 0; $RBZapisa < $VojniKandidatViewObject->BrojZapisa; $RBZapisa++) 
		{
							
		// CITANJE VREDNOSTI IZ MEMORIJSKE KOLEKCIJE $RESULT I DODELJIVANJE PROMENLJIVIM
		$IDKandidata=$VojniKandidatViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($VojniKandidatViewObject->Kolekcija, $RBZapisa, 0);//mysql_result($result,$RBZapisa,);
		$ImeKandidata=$VojniKandidatViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($VojniKandidatViewObject->Kolekcija, $RBZapisa, 1);
		$PrezimeKandidata=$VojniKandidatViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($VojniKandidatViewObject->Kolekcija, $RBZapisa, 2);
		$DatumRodjenja=$VojniKandidatViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($VojniKandidatViewObject->Kolekcija, $RBZapisa, 3);
		$Prebivaliste=$VojniKandidatViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($VojniKandidatViewObject->Kolekcija, $RBZapisa, 4);
		$KontaktTelefon=$VojniKandidatViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($VojniKandidatViewObject->Kolekcija, $RBZapisa, 5);
		$OznakaVojnogCina=$VojniKandidatViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($VojniKandidatViewObject->Kolekcija, $RBZapisa, 6);
		$Napomena=$VojniKandidatViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($VojniKandidatViewObject->Kolekcija, $RBZapisa, 7);
	
		// CRTANJE REDA TABELE SA PODACIMA
		echo "<tr>";
		echo "<td>";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$IDKandidata</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$ImeKandidata</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$PrezimeKandidata</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$DatumRodjenja</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Prebivaliste</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$KontaktTelefon</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$OznakaVojnogCina</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Napomena</font><br/>";
		echo "</td>";
		echo "</tr>";

		}  //za for 
		echo "</table>";
		echo "<br/>";
		echo "<br/>";
	}
$KonekcijaObject->DiskonektujSe();

?>



</td>

<td style="width:5%;">
</td>

</tr>
</table>

    