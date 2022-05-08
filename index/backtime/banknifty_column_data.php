<?php 

if(isset($_GET['fromdate']))
	$fromdate=$_GET['fromdate'];
if(isset($_GET['todate']))
	$todate=$_GET['todate'];
//echo 'nifty'.$fromdate.'.json';
//$fromdate=1000;
//$todate=1020;
//reading json
$json1 = file_get_contents('banknifty_'.$fromdate.'.json');
$json2 = file_get_contents('banknifty_'.$todate.'.json');
//var_dump($json);
$json1=str_replace(' ', '', $json1);
$json1=str_replace("'", "\"", $json1);
$json2=str_replace(' ', '', $json2);
$json2=str_replace("'", "\"", $json2);
//var_dump($json1);
//var_dump($json2);
$obj1 = json_decode($json1);
$obj2 = json_decode($json2);
$data2=$obj2->records->data;
$data1=$obj1->records->data;
$i=0;
$passedvalue=$obj2->records->expiryDates[0];
$pemapping=array();
$cemapping=array();
$i=0;
foreach ($data2 as $value2) {
	
		if($value2->expiryDate==$passedvalue ){
		   $pemapping[$i]=$value2->PE->changeinOpenInterest;
		   $cemapping[$i]=$value2->CE->changeinOpenInterest;
		   // echo " value is ".$value->CE->changeinOpenInterest."-strike price ".$value->strikePrice;
		   // echo "<br>";
		}
		$i++;
	}
	
$petotal2=array_sum($pemapping);
$cetotal2=array_sum($cemapping);
$i=0;
foreach($data1 as $value1){
	if($value1->expiryDate==$passedvalue){
		$pemapping[$i]=$value1->PE->changeinOpenInterest;
		$cemapping[$i]=$value1->CE->changeinOpenInterest;
	}	
	$i++;
}
$petotal1=array_sum($pemapping);
$cetotal1=array_sum($cemapping);
$petotal=$petotal2-$petotal1;
$cetotal=$cetotal2-$cetotal1;


$jsonarray=array("PE"=>array($petotal,0),"CE"=>array(0,$cetotal));

// echo "<br>";
// echo $petotal;
// echo "<br>";
// echo $cetotal;
echo json_encode($jsonarray);
/* //forming required inputs array
$required=array('NIFTY 50','NIFTY BANK','NIFTY IT','NIFTY AUTO','NIFTY MEDIA','NIFTY METAL','NIFTY FIN SERVICE','NIFTY PVT BANK',);

$categoryjson=array();
$seriesjson=array();
$mapping=array();

//mapping values in associative array map
foreach ($data as $value) {
	if(in_array($value->name, $required)){
	  $mapping[$value->name]=$value->pChange;
	}
}

//sorting in descending order of values 
arsort($mapping);

//creating two arrays for categories and series
foreach ($mapping as $key=>$value) {
	$categoryjson[]=$key;
	$seriesjson[]=$value;
}

//forming json with x-axis and y-axis values
$chartjson=array($categoryjson,$seriesjson);
echo json_encode($chartjson); */
?>
