<?php
    require "index.php";
?>

<?php

$numberOfRows = 10;
$page=isset($_GET['page']) ? $_GET['page'] : 1;
$limit = ($page - 1) * $numberOfRows;

$column =  isset($_GET['page']) ? $_GET['page'] : 1;
$dir = isset($_GET['direction']) ? $_GET['direction'] : "ASC";

$query="SELECT * FROM product ORDER BY {$column} {$dir} LIMIT {$limit},{$numberOfRows}";
$result=mysqli_query($conn, $query);

if(!$result){
	echo "Something wrong";
	echo mysqli_error($conn);
	exit();
}

$query2 = "SELECT COUNT(*) as rowCount FROM product";
$result2 = mysqli_query($conn,$query2);
$totalRows = mysqli_fetch_row($result2);
$extraRow = $totalRows[0] % $numberOfRows == 0 ? 0 : 1;
$numberofPages =$totalRows[0]/$numberOfRows;
?>

<html>
<head>
		<style>
		.pagination{
			text-align: center;
		}
		.pagination li{
			width: 20px;
			display:inline-block;
			text-align: center;
			border:1px solid black;
		}
		</style>
<body>


	<?php
	echo "<table border='1' cellspacing='3' cellpadding='3' width=100%>";
	echo "<th>Name</th>";
	$newDir = $column == "productType" ? "DESC" : "ASC";
	echo "<th><a href='paginate.php?order=productType&direction={$newDir}'>Type</a></th>";
	$newDir = $column == "ProductPrice" ? "DESC" : "ASC";
	echo "<th><a href='paginate.php?order=ProductPrice&direction={$newDir}'>Price</th>";
	//echo "<th>GNP</th>";


	while($row=mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>{$row["productName"]}</td>";
		echo "<td>{$row["productType"]}</td>";
		echo "<td style='text-align:right;'>{$row["ProductPrice"]}</td>";
		//echo "<td style='text-align:right;'>{$row["GNP"]}</td>";
		echo "</tr>";

	}

	echo "</table>";
	?>

	<div class='pagination'>
		<ul>
			<?php
			for($i=1;$i<=$numberofPages + $extraRow; $i++){
				echo "<li><a href='paginate.php?direction={$dir}&order={$column}&page={$i}'>{$i}</a></li>";
			}
			?>
		</ul>
    </div>

</body>	
</html>

