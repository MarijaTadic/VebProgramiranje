<?php session_start();

		$korisnici = array(
		"korisnik1" => ["ime" => "Pera", "prezime" => "Peric", "password" => "pera"],
		"korisnik2" => ["ime" => "Mika", "prezime" => "Mikic", "password" => "mika"],
		"korisnik3" => ["ime" => "Petar", "prezime" => "Petrovic", "password" => "peca"] );


		if(!isset($_POST['username']) || !isset($_POST['password']))
		{
			header("HTTP/1.1 400 Bad Request");
			die("Neispravan zahtev!");
		}

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if(strlen($username) == 0 || strlen($password) == 0)
		{
			die("Neispravni podaci!");
		}

		if(!isset($korisnici[$username]))
		{
			die("Neispravni podaci!");
		}

		if($korisnici[$username]['password'] != $password)
		{
			die("Neispravni podaci!");
		}

		$_SESSION['username'] = $username;
		$_SESSION['ime'] = $korisnici[$username]['ime'];
		$_SESSION['prezime'] = $korisnici[$username]['prezime'];

		$ime = $korisnici[$username]['ime'];
		$prezime = $korisnici[$username]['prezime'];

		setcookie('username', $username, time() + 2 * 60);
		setcookie('ime', $ime, time() + 2 * 60);
		setcookie('prezime', $prezime, time() + 2 * 60);


		echo "Dobrodošli!";
		header("refresh:1;url=profil.php");
?>
