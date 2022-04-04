<?php 

//reading json
$json = file_get_contents('bankNiftyStockWatch.json');
//var_dump($json);
$json=str_replace(' ', '', $json);
$json=str_replace("'", "\"", $json);
//var_dump($json);
$obj = json_decode($json);
//var_dump($obj);
$declines=$obj->declines;
$advances=$obj->advances;
$unchanged=$obj->unchanged;
#$jsonarray=array("Advances"=>$advances,"Unchanged"=>$unchanged,"Declines"=>$declines);
#echo $jsonarray;
