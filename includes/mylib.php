<?php
//DB Connection 데이터를 받아서 알맞은 커넥션을 리턴해줌. 
	function get_mysql_connection($hostname, $username, $password, $dbname){
		$mysql_conn = mysqli_connect($hostname,$username,$password,$dbname);
		mysqli_query($mysql_conn, "SET NAMES 'utf8'"); //utf8로 인코딩 해서 출력.
		return $mysql_conn;
		
	}

?>