<?php 

//reading json
$json = file_get_contents('Recovery_from_intraday_low.json');
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
	$result3[$i]['Company Name']=$obj->searchresult[$i]->companyShortName;
	$result3[$i]['LTP']=$obj->searchresult[$i]->current;
	$result3[$i]['Sector Name']=$obj->searchresult[$i]->sectorName;
	$result3[$i]['High']=$obj->searchresult[$i]->high;
	$result3[$i]['Low']=$obj->searchresult[$i]->low;
}	
//var_dump($result);
echo "<h6>RECOVERY FROM INTRADAY LOW</h6>";
$tablehtml=build_table($result3,'Recovery_from_intraday_low');
echo $tablehtml;

?>