<!DOCTYPE html>
<html>

		<title>Result</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/vue.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style-calresult.css">

	</head>

	<body>

		<div class="app">
			
			<div class="container">

				<div class="col-md-12 ">
					<div class="">

	<div class="result">
		
		<?php
			// รับค่าจากหน้าที่แล้วมา
			// ส่งค่ามาเป็น post

		//	$thb = $_POST ['attribute name'];
			$thb = $_POST ['thb'];
			$type = $_POST['type'];


			echo "<br>";
			echo "ค่าที่กรอก คือ ".$thb;
			echo "<br>";
			echo "สกุลเงินที่ใช้คำนวณ ".$type;
			echo "<br>";
			

			//แบบที่1

			if ($type=="usd") {
				$result = $thb / 31.2273;
			
			} elseif ($type=="jyp") {
				$result = $thb / 28.9814;
			
			} elseif ($type=="krw") {
				$result = $thb * 0.0293;
			
			} elseif ($type=="gbp") {
				$result = $thb / 43.3292;
			
			} elseif ($type=="eur") {
				$result = $thb / 38.2737;
			}

			echo "Result = ".$result;
			echo "<br>";
			echo "<br>";



			//แบบที่2

			// if ($type=="usd") {
			// 	$rate = 31.2273;
			
			// } elseif ($type=="jyp") {
			// 	$rate = 28.9814;
			
			// } elseif ($type=="krw") {
			// 	$rate = 0.0293;
			
			// } elseif ($type=="gbp") {
			// 	$rate = 43.3292;
			
			// } elseif ($type=="eur") {
			// 	$rate = 38.2737;
			// }

			// echo "Result=".$thb*$rate;


			//แบบที่3

			// switch ($type) {
			// 	case 'usd':
			// 		$rate=31.2273;
			// 		break;

			// 	case 'jyp':
			// 		$rate=28.9814;
			// 		break;

			// 	case 'krw':
			// 		$rate=0.0293;
			// 		break;

			// 	case 'gbp':
			// 		$rate=43.3292;
			// 		break;

			// 	case 'eur':
			// 		$rate=38.2737;
			// 		break;
				
			// 	default:
			// 		$rate = 0;
			// 		break;
			// }

			// echo "Result=".thb*rate;

	


			require 'connect.php';


			$sql = "INSERT INTO exch712_history(thb, calculated, currency) VALUES($thb, $result, '$type')";

			// สั่งให้ตัวแปรทำงาน
			$sql_exe=$conn -> query($sql);

			//print($sql_exe);



		?>

	</div>

	
	<?php 
     	$sql = "SELECT * FROM exch712_history ORDER BY dateRecord DESC";
     	$sql_exe = $conn -> query($sql);
    ?>

  	<table class="table table-striped table-hover">
   		<thead>
    	
	    	<tr>
	     		<th class="text-center" colspan="5">History</th>
	    	</tr>

	    	<tr>
			     <th>You money</th>
			     <th>Currency</th>
			     <th>Calculated</th>
			     <th>Time Record</th>
			     <th>Delete</th>
	    	</tr>
   		</thead>

  	
  	<?php 
   

	   while ($row = mysqli_fetch_assoc($sql_exe)) {
	         // $array['key/field name'];
	    echo "<tr>
	        <td>".$row['thb']."</td>
	      	<td>"." exchage to ".$row['currency']."</td>
	      	<td>".$row['calculated']."</td>
	      	<td>".$row['dateRecord']."</td>";

  	?>


	 <td>
		<a class="btn btn-danger"  href="delete.php?id=<?php echo $row['recordID']?> &thb=<?php echo $row['thb'] ?>">Delete
		</a>
	 </td>

  	</tr>

  	<?php

   		}
   			$conn->close();
  	?>
  	
  	</table>
			
		
	</body>

</html>