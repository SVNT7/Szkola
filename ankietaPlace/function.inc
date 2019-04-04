<?php
	function lacz_bd(){		//  host 	  user   haslo  baza
			$wynik = @new mysqli("localhost",'d16_eb1b59','1234',"d16_skoncej_michal");

			if(mysqli_connect_errno()){
				echo '<p>Polaczenie z serwerem bazy danych nie powiodlo sie. Komunikat bledu: '.mysqli_connect_error().'</p>';
				exit();
			}else{
				$wynik->query("set names 'utf8'");
			//	echo "<p>Polaczono z baza</p>";
				return $wynik;
			}
		}
?>