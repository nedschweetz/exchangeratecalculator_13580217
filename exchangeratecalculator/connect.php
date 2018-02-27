<?php

	// if ($_SERVER['HTTP_HOST']=='localhost') {
		// $DB_SERVER = 'localhost';
		// $DB_USER_READER = 'root';
		// $DB_PASS_READER = 'Silpakorn60';
		// $DB_NAME = 'db712_exchangerate';

		// echo "localhost";
	
	// } else { // บน ser imsu.co
		$DB_SERVER = 'localhost';
		$DB_USER_READER = 'u13580217';
		$DB_PASS_READER = 'Uc42Ml0oiv';
		$DB_NAME = 'db13580217';
	// }

	// คำสั่งที่ใช้ต่อกับฐานข้อมูล
	$conn = new mysqli($DB_SERVER, $DB_USER_READER, $DB_PASS_READER, $DB_NAME);

	// ตรวจว่าต่อสำเร็จหรือไม่

		
	// if ($conn -> connect_error) {
	// 	die("connection failed".$conn -> connect_error);
	// }


	if (!$conn) {
		die("connection failed".mysqli_connect_error());
	}

	mysqli_set_charset($conn, "utf8");

?>