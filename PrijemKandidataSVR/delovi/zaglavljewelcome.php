
<?php



    //session_start();
    $korisnik=$_SESSION["korisnik"];

   
	   // citanje vrednosti iz sesije
	   
      		
?>

<meta charset="UTF-8">

<div id="header" style="background-color: #333; color: #fff; padding: 10px; display: flex; align-items: center;">
    <div style="flex: 1; font-size: 24px; font-weight: bold;">
        <a href="Welcome.php" style="text-decoration: none; color: #fff;">Пријем кандидата за служење војног рока</a>
    </div>
    <div style="font-family: 'Trebuchet MS', sans-serif; font-size: 16px; margin-right: 20px;">
        Добродошли, <?php echo $korisnik; ?> <!-- Dodajte PHP kod za preuzimanje imena korisnika iz sesije -->
    </div>
    <div>
        <a href="index.php" style="text-decoration: none; color: #fff; font-size: 16px; padding: 10px 20px; background-color: transparent; border-radius: 5px;">Одјава</a>
    </div>
</div>


