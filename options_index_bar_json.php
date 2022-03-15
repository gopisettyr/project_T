<?php 

//reading json
$json = file_get_contents('http://localhost/simplexls-master/examples/Project_T/project_T/banknifty.json');
$obj = json_decode($json);
$data=$obj->records->underlyingValue;
$atm;
if(($data%100)<51)
	$atm=floor($data/100)*100;
else
	$atm=ceil($data/100)*100;

$itm=array();
$otm=array();
for($i=1;$i<=10;$i++)
{
	$otm[$i]=$atm+($i*100);
	$itm[$i]=$atm-($i*100);
}

// echo "otm";
// echo "<br>";
$j=0;
$categories=array();
for($i=$i-1;$i>0;$i--)
{
	$categories[$j]=$itm[$i];
	$j++;
	// echo $val;
	// echo "<br>";
}
// echo "atm";
// echo "<br>";
// echo $atm;
$categories[$j]=$atm;
$j++;
// echo "<br>";
// echo "itm";
// echo "<br>";
foreach($otm as $val)
{
	$categories[$j]=$val;
	$j++;
	// echo $val;
	// echo "<br>";
}
//echo floor($data/100)*100; 
echo json_encode(array("categories"=>$categories));

?>
