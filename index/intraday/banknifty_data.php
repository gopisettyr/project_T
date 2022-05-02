<?php 

//reading json
$json = file_get_contents('banknifty.json');
//var_dump($json);
$json=str_replace(' ', '', $json);
$json=str_replace("'", "\"", $json);
//var_dump($json);
$obj = json_decode($json);
//var_dump($obj);
$data=$obj->records->underlyingValue;
$atm;
if(($data%100)<51)
	$atm=floor($data/100)*100;
else
	$atm=ceil($data/100)*100;

$itm=array();
$otm=array();
$ATM=array();
$ATM[0]=$atm;
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
$changeince=array();
$changeinpe=array();
$filterdata=$obj->filtered->data;
$k=0;
foreach($filterdata as $val)
{
	foreach($categories as $cat){
		if($val->strikePrice==$cat)
		{
			$changeince[$k]=$val->CE->changeinOpenInterest;
			$changeinpe[$k]=$val->PE->changeinOpenInterest;
			$k++;
		}
	}
}
echo json_encode(array("categories"=>$categories,"CE"=>$changeince,"PE"=>$changeinpe,"ATM"=>$ATM));

?>
