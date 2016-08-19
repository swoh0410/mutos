<?php
//DB Commands

	function db_swoh_mutos_conn_info(){
		$connLocation = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php"; //mylib.php 주소. DB랑 Connection을 해주는곳.
		require_once ($connLocation);
		$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
		$username = 'SWOH';
		$password = 'password';
		$dbname = 'swoh_mutos';
		$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);
		return $mysql_conn;
	}
	/* TEST1
	$cols['key1'] = "value1";
	$cols['key2'] = "value2";
	$cols['key3'] = "value3";
	$cols['key4'] = "value4";
	insertDB("conn", "TestTable", $cols);
	*/
	function insertDB($mysql_conn, $table, $cols){
		$fields = "";
		$values = "";
		$number_of_fields = count($cols);
		$counter = 1;
		
		foreach($cols as $key => $value){
			if($counter < $number_of_fields){
				$fields = $fields . $key . ", ";
				$values = $values . "\"" . $value . "\"".", ";
			}else{
				$fields = $fields . $key;
				$values = $values . "\"" . $value . "\"";
			}
			$counter++;
		}
	
		echo " <br> TABLE: " . $table . "<br>"
		."Fields: " . $fields . "<br>"
		."Values: " . $values . "<br>";
	
		
		$insert_query = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, $fields,$values);

		echo $insert_query . "<br>";
			
		if(mysqli_query($mysql_conn, $insert_query) === false) {
			echo mysqli_error ($mysql_conn);
		}else{
			echo 'DB INSERT 성공<br>';
		}
		
		
	}
?>