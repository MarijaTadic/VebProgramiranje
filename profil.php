<?php session_start();

	if(isset($_SESSION['username']))
	{
		$ime = $_SESSION['ime'];
		$prezime = $_SESSION['prezime'];
	}
	else if(isset($_COOKIE['username']))
	{
		$ime = $_COOKIE['ime'];
		$prezime = $_COOKIE['prezime'];
	}
	else
		header("Location: registracija.php");
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Profil | <?php echo $ime." ".$prezime?></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


	<h1>Zdravo, <?php echo $ime." ".$prezime."!" ?></h1>
	<a href="logout.php">Izloguj se</a>

</body>
</html>
