<html>
<head>
<style>
table, th, td{
border: 1px solid black;	
}
</style>
</head>

<body>
<?php
$string = '24';
echo 'retrieved Data: ' . gettype($string). $string. "<br>";
echo "This should be an int type 24" .gettype(intval($string)).$string. "<br>";
echo 'This should be a String 24: '. gettype($string).$string ."<br>";
var_dump(intval($string)); //int(24)
$null = array(null);
echo "<br> this should be a null! :<b>";
var_dump($null[0]);
$a = 1;
echo "<br>should be true". isset($a);
echo "</b><br>";
//gettype()
//intval(),strval(),floatval()
//var_dump()

?>
<table>
<tr>
	<th>   </th>
	<th>int</th> 
	<th>flaot </th>
	<th>string </th>
	<th>boolean </th>
	<th>array </th>
	<th>null </th>
</tr>
<?php
$columns = array(array(0,1), array(0.0,1.9), array('','0','0.0','1.9'),
					array(true,false), array([],[''],[false],['a']), array(null));
$rows = array("To int", 'To float' , 'to String', 'to Boolean');

for($r = 0; $r < count($rows); $r++ ){ // $r = 'target type'
	echo "<tr>";
	echo "<td><b>$rows[$r]</b></td>";
	for($i = 0; $i < count($columns); $i++){// $i = column arr
		echo "<td>";
		for($j = 0; $j < count($columns[$i]); $j++){// $j = inner column array	
			switch($r){
				case 0:
					var_dump(intval($columns[$i][$j]));
					echo ',';
					break;
				case 1:
					var_dump(floatval($columns[$i][$j]));
					echo ',';
					break;
				case 2:
					var_dump(strval($columns[$i][$j]));
					echo ',';
					break;
				case 3:
					var_dump(boolval($columns[$i][$j]));
					echo ',';
					break;
			}
		}
		echo "</td>";
	}
	echo "</tr>";
}

?>	
</table>


</body>
</html>