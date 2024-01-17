<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" />

<table style="width:100%;" width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#cbe3f7">

	<tr>
		<td style="width:5%;">
		</td>

		<td>
			<font face="Trebuchet MS" color="darkblue" size="4px">
				<b>ПОДАЦИ О ВОЈНОМ КАНДИДАТУ</br>
			</font>


		</td>

		<td style="width:5%;">
		</td>
	</tr>


	<tr>
		<td style="width:5%;">
		</td>

		<td align="left">
			<br />
			<font face="Trebuchet MS" color="darkblue" size="4px">

				<?php

				// PRETHODNI KOD PREUZIMA PODATKE I TO JE NA INDEX.PHP

				// CRTANJE REDA TABELE SA PODACIMA

				echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">ИД Кандидата: $IDKandidata</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Име Кандидата: $ImeKandidata</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Презиме кандидата: $PrezimeKandidata</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Датум рођења: $DatumRodjenja</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Пребивалиште: $Prebivaliste</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Контакт телефон: $KontaktTelefon</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Ознака војног чина: $OznakaVojnogCina</font><br/>";
				echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">Напомена: $Napomena</font><br/>";

				?>

		</td>

		<td style="width:5%;">
		</td>

	</tr>
</table>