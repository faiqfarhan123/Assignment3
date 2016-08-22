<?php
	//defining connection with database
	
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'wahecrus');
   define('DB_DATABASE', 'survey');
   $dbc = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>