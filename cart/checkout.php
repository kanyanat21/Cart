<?php
session_start();

?>
<html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
include 'conndb.php';
?>
<table width="400"  border="1">
  <tr>
    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="82">Price</td>
    <td width="79">Qty</td>
    <td width="79">Total</td>
  </tr>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$objQuery = $conn ->query("SELECT * FROM product WHERE ProductID = '".$_SESSION["strProductID"][$i]."' ") ;
		$objResult = mysqli_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?php echo $_SESSION["strProductID"][$i];?></td>
		<td><?php echo $objResult["ProductName"];?></td>
		<td><?php echo $objResult["Price"];?></td>
		<td><?php echo $_SESSION["strQty"][$i];?></td>
		<td><?php echo number_format($Total,2);?></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
Sum Total <?php echo number_format($SumTotal,2);?>
<br><br>
<form name="form1" method="post" action="save_checkout.php">
  <table width="304" border="1">
    <tr>
      <td width="71">Name</td>
      <td width="217"><input type="text" name="txtName"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txtAddress"></textarea></td>
    </tr>
    <tr>
      <td>Tel</td>
      <td><input type="text" name="txtTel"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="txtEmail"></td>
    </tr>
  </table>
    <input type="submit" name="Submit" value="Submit">
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>