<?php 

//reading json
$json = file_get_contents('Fall_from_intraday_high.json');
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
	$result2[$i]['Company Name']=$obj->searchresult[$i]->companyShortName;
	$result2[$i]['LTP']=$obj->searchresult[$i]->current;
	$result2[$i]['Sector Name']=$obj->searchresult[$i]->sectorName;
	$result2[$i]['High']=$obj->searchresult[$i]->high;
	$result2[$i]['Low']=$obj->searchresult[$i]->low;
}	
//var_dump($result);
echo "<h6>FALL FROM INTRADAY HIGH</h6>";
$tablehtml=build_table($result2,'Fall_from_intraday_high');
echo $tablehtml;

?>