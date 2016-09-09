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
	insertDB("mysql_conn", "TestTable", $cols);
	*/
	function checkID($preferred_id){
		$mysql_conn = db_swoh_mutos_conn_info();
		$stmt = mysqli_prepare($mysql_conn, "SELECT count(*) as num FROM user_account WHERE id = ?");
		mysqli_stmt_bind_param($stmt,"s",$preferred_id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result); //아이디 있는지 여부를 알아와서 저장.아직 Array 형식.
		mysqli_free_result($result);
		mysqli_close($mysql_conn);
		
		return $row['num'];
	}
	function insertDB($mysql_conn, $table, $cols){
		$fields = "";
		//$values = "";
		$values = array();
		$number_of_fields = count($cols);
		$counter = 1;
		$success = '';
		$value_question_marks = '';
		$column_types = '';
		
		foreach($cols as $key => $value){
			if($counter < $number_of_fields){
				$fields = $fields . $key . ', ';
			//	$values = $values . "\"" . $value . "\"".", ";
				$values[] = $value;
				$value_question_marks = $value_question_marks . '?' . ', ';
			}else{
				$fields = $fields . $key;
			//	$values = $values . "\"" . $value . "\"";
				$values[] = $value;
				$value_question_marks = $value_question_marks. '?';
			}
			$counter++;
			

			switch(gettype($value)){
				case 'string': $column_types = $column_types . 's';
				break;
				case 'integer': $column_types = $column_types . 'i';
				break;
				case 'double': $column_types = $column_types . 'd';
				break;
			}
		}
	
		//echo " <br> TABLE: " . $table . "<br>"
		//."Fields: " . $fields . "<br>"
		//."Values: " . $values . "<br>";
		
		//test
		//echo "<br> FIELD Q => " . $field_question_marks . "<br>".
		//"<br> VALUES Q => " . $value_question_marks . "<br>".
		//"<br> stmt Q => " . "INSERT INTO ".$table." (".$fields.") VALUES //("; var_dump($values); echo ")" . "<br>type->>>>" . $column_types. "";
		
		$insert_query = "INSERT INTO " . $table . " (". $fields .") VALUES (" .$value_question_marks . ")";
		//echo ">>>>>>>>>".$query . ">>>>>>>>>>>" . $column_types;
		$stmt = mysqli_prepare($mysql_conn, $insert_query);
		$params= array_merge(array($column_types), $values);
		//mysqli_stmt_bind_param($stmt, $column_types,$values);
		$binding_stmt = array($stmt, 'bind_param');
		call_user_func_array($binding_stmt,makeValuesReferenced($params));
		
		//echo $query . "<br>";
			
		if(mysqli_stmt_execute($stmt) === false) {
			$successful = false;
			echo mysqli_error($mysql_conn);
		}else{
			$successful = true;
		}
		mysqli_close($mysql_conn);
		return $successful;
	}
	function get_user_account_pk($id){
		$mysql_conn = db_swoh_mutos_conn_info();
		$stmt = mysqli_prepare($mysql_conn, "SELECT user_account_pk FROM user_account WHERE id = ?");
		mysqli_stmt_bind_param($stmt,"s",$id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result); //결과값은 아레이 형식, 여기서는 $row['user_account_pk']라고 해야함 key=column name.
		mysqli_free_result($result);
		mysqli_close($mysql_conn);
		
		return $row['user_account_pk'];// pk값 리턴.
	}
	
	function makeValuesReferenced($arr){ 
        $refs = array(); 
        foreach($arr as $key => $value) 
        $refs[$key] = &$arr[$key]; 
        return $refs; 

    } 
	
?>