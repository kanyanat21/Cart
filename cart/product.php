<?php
//session_start();
//session_destroy();
include 'conndb.php';
?>
<html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container mt-3">
<?php
$sql = $conn ->query("SELECT * FROM product") ;
?>
<table class="table border-1"> 
  <tr>
    <td width="101">Picture</td>
    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="79">Price</td>
    <td width="37">Cart</td>
  </tr>
  <?php
  while($rs = mysqli_fetch_array($sql))
  {
  ?>
  <tr>
	<td><img class="w-100" src="img/<?php echo $rs["Picture"];?>"></td>
    <td><?php echo $rs["ProductID"];?></td>
    <td><?php echo $rs["ProductName"];?></td>
    <td><?php echo $rs["Price"];?></td>
    <td><a href="order.php?ProductID=<?php echo $rs["ProductID"];?>">Order</a></td>
  </tr>
  <?php
  }
  ?>
</table>
<br><br><a href="show.php">View Cart</a> | <a href="clear.php">Clear Cart</a>
<?php
mysqli_close($conn);
?>
</div>


</body>
</html>