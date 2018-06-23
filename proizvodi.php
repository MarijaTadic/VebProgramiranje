<?php
session_start();
connect= mysqli_connect("localhost", "root", '', 'proizvodi');
?>


<!DOCTYPE html>
<html>

<head>
	<title> Lavanda shop </title>
	<link rel="stylesheet" href="style.css" type="text/css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
	<?php
	$query = "SELECT * FROM product ORDER BY id ASC"
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_array($result))
			{
					
					<div class="col-md-4">
						<form method="post" action="shop.php?action=add%id=<?php echo $row["id"];?>">
							<div style= "border: 1px solid #white; margin: -1px 10px 3px -1px; box-shadow: 0 1px 2px rgba{0,0,0,0,05}; padding:10px;" align="center">
								<img src="<?php echo $row["slika"]; ?>" class="img.responsive">
								<h5 class="text-info"><?php echo $row["naziv"]; ?> </h5>
								<h5 class="text-danger">$<?php echo $row["cena"]; ?> </h5>
								<input type="text" name="kolicina" class="form-control" value="1";
								<input type="hidden" name="hidden_name" value="<?php echo $row["naziv"]"; ?> ">
								<input type="hidden" name="hidden_price" value="<?php echo $row["cena"]"; ?> ">
								<input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value"Dodaj u korpu">
								</div>
								</form>
								</div>
								<?php
							}
						}
						?>

								<div style="clear: both"></div>
								<h2> Moja korpa </h2>
								<div class = "table-responsive">
								<table class="table table-bordered">
								<tr>
								<th> Naziv proizvoda </th>
								<th>Kolicina </th>
								<th> Cena </th>
								</tr>
								<?php
								if($empty($_SESSION["cart"]))
								{
									$total=0;
									foreach($_SESSION["cart"] as $keys =>$values){
										?>
										<tr>
										<td> <?php echo $values["naziv_proizvoda"];?> </td>
										<td> <?php echo $values["kolicina_proizvoda"];?> </td>
										<td> <?php echo $values["cena_proizvoda"];?> </td>
										<td> <?php echo number_format($values["kolicina_proizvoda"]*$values["cena_proizvoda"], 2);?> </td>
										<td><a href="shop.php?action=delete%id=<?php echo $values["id_proizvoda"]; ?>"><span class="text-danger">X</span></a></td>
										</tr>
										<?php
										$total=$total+($values["kolicina_proizvoda"]*$values["cena_proizvoda"]);
									}
									?>
									<tr>
									<td colspan="3" align="right"> Ukupno </td>
									<td align="right"> RSD <?php echo number_format($total, 2); ?> </td>
									<td></td>
									<tr>
									<?php
								}
								?>
								</table>
								</div>
								</div>




</body>
</html>
