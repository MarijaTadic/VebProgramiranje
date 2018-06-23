<?php
session_start();
$connect=mysqli_connect(("localhost", "root", '', 'proizvodi');
if(isset($_POST["add"]))
{
  if(isset($_SESSION["cart"]))
  {
    $item_array_id = array_column($_SESSION["cart"], "id_proizvoda");
    if(lin_array($GET["id"], $item_array_id))
    {
      $count=count($_SESSION["cart"]);
      $item_array=array(
        'id_proizvoda' =>$_GET["id"],
        'naziv_proizvoda' =>$_POST["hidden_name"],
        'cena_proizvoda' =>$_POST["hidden_price"],
        'kolicina_proizvoda' =>$_POST["Kolicina"]
      );
      $_SESSION["cart"][$count]=$item_array;
      echo '<script>windows.location="proizvodi.php"</script>';
    }
    else{
      echo '<script>alert("Proizvod je dodat.")</script>';
      echo '<script>windows.location="proizvodi.php"</script>';
    }
    else{
      $item_array = array(
        'id_proizvoda' =>$_GET["id"],
        'naziv_proizvoda' =>$_POST["hidden_name"],
        'cena_proizvoda' =>$_POST["hidden_price"],
        'kolicina_proizvoda' =>$_POST["Kolicina"]
      );
        $_SESSION["cart"][0]=$item_array;
    }
  }
  if(isset($_GET["action"]))
  {
    if($_GET["action"]=="delete")
    {
      foreach ($_SESSION["cart"] as $keys => $values)
      {
        if($values[id_proizvoda]==$_GET["id"])
        {
          unset($_SESSION["cart"][$keys]);
          echo '<script>alert("Proizvod je izbrisan.")</script>';
          echo '<script>windows.location="proizvodi.php"</script>';
        }
      }
    }

  }

 ?>
