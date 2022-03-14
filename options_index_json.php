<?php 

//reading json
$json = file_get_contents('http://localhost/simplexls-master/examples/Project_T/banknifty.json');
$obj = json_decode($json);
$data=$obj->records->data;
$i=0;
$passedvalue="17-Mar-2022";
$pemapping=array();
$cemapping=array();
$i=0;
foreach ($data as $value) {
	if($value->expiryDate==$passedvalue){
	   $pemapping[$i]=$value->PE->changeinOpenInterest;
	   $cemapping[$i]=$value->CE->changeinOpenInterest;
	   // echo " value is ".$value->CE->changeinOpenInterest."-strike price ".$value->strikePrice;
	   // echo "<br>";
	}	
	$i++;
}

$petotal=array_sum($pemapping);
$cetotal=array_sum($cemapping);
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
