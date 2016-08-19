<?php

 

    $id = "user";
    $password = "1234"; 
	
	$handle = fopen(USER_ACCOUNTS_FILE_NAME, "a");
	
	 echo "PASSWORD HASH :" . password_hash($password, PASSWORD_DEFAULT);
