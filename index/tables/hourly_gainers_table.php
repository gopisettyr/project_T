<?php 
//Function to create table
  function build_table($array,$tablename){
    // start table
    $html = '<table id='."$tablename".' class="table table-striped">';
    // header row
    $html .= '<thead><tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr></thead>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tbody><tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr></tbody>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
  }
//reading json
$json = file_get_contents('hourly_gainers.json');
//var_dump($json);
$json=str_replace(' ', '', $json);
$json=str_replace("'", "\"", $json);
$json=str_replace("None","\"None\"", $json);
//echo file_put_contents("test.txt","$json");
//var_dump($json);
$obj = json_decode($json);
//var_dump($obj);
$data=$obj->searchresult[0]->companyShortName;
for($i=0;$i<8;$i++)
{	
	$result1[$i]['Company Name']=$obj->searchresult[$i]->companyShortName;
	$result1[$i]['LTP']=$obj->searchresult[$i]->current;
	$result1[$i]['Sector Name']=$obj->searchresult[$i]->sectorName;
	$result1[$i]['High']=$obj->searchresult[$i]->high;
	$result1[$i]['Low']=$obj->searchresult[$i]->low;
}	
//var_dump($result);
$tablehtml=build_table($result1,'Hourly_Gainers');
echo "<h6>HOURLY GAINERS</h6>";
echo $tablehtml;

?>