<?php 

//reading json
if(isset($_GET['fromdate']))
	$fromdate=$_GET['fromdate'];
if(isset($_GET['todate']))
	$todate=$_GET['todate'];
//echo 'nifty'.$fromdate.'.json';
//$fromdate=1000;
//$todate=1020;
$json1 = file_get_contents('nifty_'.$fromdate.'.json');
$json2 = file_get_contents('nifty_'.$todate.'.json');
//var_dump($json);
$json1=str_replace(' ', '', $json1);
$json1=str_replace("'", "\"", $json1);
$json2=str_replace(' ', '', $json2);
$json2=str_replace("'", "\"", $json2);
//var_dump($json1);
//var_dump($json2);
$obj1 = json_decode($json1);
$obj2 = json_decode($json2);
//var_dump($obj);
$data2=$obj2->records->underlyingValue;
$atm;
if(($data2%100)<51)
	$atm=floor($data2/100)*100;
else
	$atm=ceil($data2/100)*100;

$itm=array();
$otm=array();
$ATM=array();
$ATM[0]=$atm;
for($i=1;$i<=10;$i++)
{
	$otm[$i]=$atm+($i*50);
	$itm[$i]=$atm-($i*50);
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
$filterdata2=$obj2->filtered->data;
$filterdata1=$obj1->filtered->data;
$k=0;
foreach($filterdata2 as $val2)
{
	foreach($filterdata1 as $val1){
	{
		foreach($categories as $cat){
			if($val2->strikePrice==$cat && $val1->strikePrice==$cat)
			{
				//echo $val2->CE->changeinOpenInterest."inside".$val1->CE->changeinOpenInterest;
				//echo "<br>";
				$changeince[$k]=$val2->CE->changeinOpenInterest-$val1->CE->changeinOpenInterest;
				$changeinpe[$k]=$val2->PE->changeinOpenInterest-$val1->PE->changeinOpenInterest;
				$k++;
			}
		}
	}
}
}
echo json_encode(array("categories"=>$categories,"CE"=>$changeince,"PE"=>$changeinpe,"ATM"=>$ATM));

?>
