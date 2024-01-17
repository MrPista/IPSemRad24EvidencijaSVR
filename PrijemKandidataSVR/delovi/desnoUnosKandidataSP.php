<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" />

<table style="width:100%;" width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#cbe3f7">
	<tr>
		<td style="width:5%;">
		</td>

		<td align="left">
			<br />
			<b>
				<font face="Trebuchet MS" color="darkblue" size="4px"> </font>
			</b>
			<table style="width:100%;" bgcolor="#cbe3f7" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">

				<tr>
					<td style="width:3%;">
					</td>
					<td align="center">
						<font color="#cbe3f7" size="1px">.</font>
					</td>
					<td style="width:3%;">
					</td>
				</tr>

				<tr>
					<td style="width:3%;">
					</td>
					<td align="center">
						<b>
							<font face="Trebuchet MS" color="black" size="3px">УНОС НОВОГ КАНДИДАТА применом stored procedure
						</b></br>
					</td>
					<td style="width:3%;">
					</td>
				</tr>

				<tr>
					<td style="width:3%;">
					</td>
					<td align="center">
						<font color="#cbe3f7" size="1px">.</font>
					</td>
					<td style="width:3%;">
					</td>
				</tr>

				<tr>
					<td style="width:3%;">
					</td>

					<td align="center">


						<!------------------------FORMA ZA UNOS---------------------------->
						<table style="width:50%;" bgcolor="#cbe3f7" padding:0" align="center" cellspacing="0" cellpadding="0" border="0">
							<form name="FormaZaUnosVojnogKandidata" action="VojniKandidatSnimiSP.php" METHOD="POST" enctype="multipart/form-data">

								<tr>
									<td align="right" valign="bottom">
										<b>
											<font face="Trebuchet MS" color="black" size="2px">ИД Кандидата&nbsp;&nbsp;</font>
										</b>
									</td>
									<td align="left" valign="bottom">
										<input name="IDKandidata" type="text" size="50" placeholder="Унесите ИД Кандидата" required/>
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<b>
											<font face="Trebuchet MS" color="black" size="2px">Име кандидата&nbsp;&nbsp;</font><br />
										</b>
									</td>
									<td align="left" valign="bottom">
										<input name="imeKandidata" type="text" size="50" placeholder="Име кандидата" required/>
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<b>
											<font face="Trebuchet MS" color="black" size="2px">Презиме кандидата&nbsp;&nbsp;</font><br />
										</b>
									</td>
									<td align="left" valign="bottom">
										<input name="prezimeKandidata" type="text" size="50" placeholder="Унесите презиме кандидата" required/>
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<b>
											<font face="Trebuchet MS" color="black" size="2px">Датум рођења (гггг-мм-дд)&nbsp;&nbsp;</font><br />
										</b>
									</td>
									<td align="left" valign="bottom">
										<input name="datumRodjenja" type="text" size="50" placeholder="Унесите датум рођења (гггг-мм-дд)" required title="Унесите датум рођења (гггг-мм-дд)" pattern="\d{4}-\d{2}-\d{2}" title="Унесите датум рођења у траженој форми" required/>
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<b>
											<font face="Trebuchet MS" color="black" size="2px">Пребивалиште&nbsp;&nbsp;</font><br />
										</b>
									</td>
									<td align="left" valign="bottom">
										<input name="prebivaliste" type="text" size="50" placeholder="Унесите пребивалиште" required/>
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<b>
											<font face="Trebuchet MS" color="black" size="2px">Контакт телефон&nbsp;&nbsp;</font><br />
										</b>
									</td>
									<td align="left" valign="bottom">
										<input name="kontaktTelefon" type="text" size="50" placeholder="Унесите контакт телефон" pattern="[0-9]{9,15}" title="Унесите валидан контакт телефон (фискни са префиксом или мобилни телефон) 9-15 цифара" required/>
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<b>
											<font face="Trebuchet MS" color="black" size="2px">Војни чин&nbsp;&nbsp;</font><br />
										</b>
									</td>
									<td align="left" valign="bottom">
										<select name="oznakaVojnogCina" required TABINDEX=7>
											<option value="">изаберите...</option>
											<?php
											// upis vrednosti iz bp - Vojni Čin

											// PREDSTAVLJANJE U OPTION KROZ FOR CIKLUS
											if ($UkupanBrojZapisa > 0) {
												for ($brojacJedinica = 0; $brojacJedinica < $UkupanBrojZapisa; $brojacJedinica++) {
													$oznakaVojnogCina = $VojniCinObject->DajVrednostPoRednomBrojuZapisaPoRBPolja($KolekcijaZapisa, $brojacJedinica, 0);
													$nazivVojnogCina = $VojniCinObject->DajVrednostPoRednomBrojuZapisaPoRBPolja($KolekcijaZapisa, $brojacJedinica, 1);
													echo "<option value=\"$oznakaVojnogCina\">$nazivVojnogCina</option>";
												} //for

											} // 

											?>

										</select>
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<b>
											<font face="Trebuchet MS" color="black" size="2px">Напомена&nbsp;&nbsp;</font><br />
										</b>
									</td>
									<td align="left" valign="bottom">
										<input name="napomena" type="text" size="50" placeholder="Унесите напомену" required/>
									</td>
								</tr>

								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
									</td>
								</tr>

								<!-------------------------- prazan red ------->
								<tr>
									<td align="right" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
									<td align="left" valign="bottom">
										<font face="Trebuchet MS" color="#cbe3f7" size="2px">.</font><br />
									</td>
								<tr>

									<td>
									</td>
									<td><input TYPE="submit" name="snimiButton" value="СНИМИ" TABINDEX=3 />
									</td>
							</form>
						</table>

					</td>
					<td style="width:3%;">
					</td>
				</tr>

				<tr>
					<td style="width:3%;">
					</td>
					<td align="center">
						<font color="#cbe3f7" size="1px">.</font>
					</td>
					<td style="width:3%;">
					</td>
				</tr>
			</table>
		</td>

		<td style="width:5%;">
		</td>

	</tr>
</table>
<img src="images/sredinadole.jpg" width="100%" height="5" alt="" class="flt1" />