<?php
  
// Read the JSON file 
$json = file_get_contents('readdata.json');
  
// Decode the JSON file
$json_data = json_decode($json,true);
$newDate = date('H:i');  
// Display data
#print_r($json_data);
$time=$json_data['categories'];
$CE=$json_data['CE'];
$PE=$json_data['PE'];
array_push($time,$newDate);
$Full_Data=json_encode(array("categories"=>$time,"CE"=>$CE,"PE"=>$PE));
file_put_contents('readdata.json',$Full_Data);
?>
