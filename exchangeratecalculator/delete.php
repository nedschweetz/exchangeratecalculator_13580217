<!DOCTYPE html>
<html>

		<title>Result</title>
		<script type="text/javascript" src="js/vue.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style-calresult.css">

	</head>

	<body>

		<div class="app">
			
			<div class="container">

				<div class="col-md-12 text-center delete">
					<div class="col-md-4 col-md-offset-4">




					<?php

					require 'connect.php';


						$id = $_REQUEST['id'];
						$thb = $_REQUEST['thb'];

						$sql = "DELETE FROM exch712_history WHERE exch712_history.recordID = '$id'";

						$sql_exe = $conn->query($sql);

						if ($sql_exe) {
							echo "Delete complete"."Id = ".$id."<br>"."THB = ".$thb; 
							header("Refresh:3, url=index.html",true,30);
						
						} else {
							echo "Delete failed";
						}

						?>


					</div>
				</div>
			</div>
		</div>		
			
		
	</body>

</html>