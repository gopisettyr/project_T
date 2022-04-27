<?php 

//reading json
$json = file_get_contents('volume_shockers.json');
//var_dump($json);
$json=str_replace(' ', '', $json);
$json=str_replace("'", "\"", $json);
$json=str_replace("None","\"None\"", $json);
$json=str_replace("False","\"False\"", $json);
$json=str_replace("True","\"True\"", $json);
//echo file_put_contents("test.txt","$json");
//var_dump($json);
$obj = json_decode($json);
//var_dump($obj);
$data=$obj->searchresult[0]->companyShortName;
for($i=0;$i<8;$i++)
{	
	$result5[$i]['Company Name']=$obj->searchresult[$i]->companyShortName;
	$result5[$i]['LTP']=$obj->searchresult[$i]->current;
}	
//var_dump($result);
echo "<h6>VOLUME SHOCKERS</h6>";
$tablehtml=build_table($result5,'volume_shockers');
echo $tablehtml;

?>