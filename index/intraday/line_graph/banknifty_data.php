<?php
sleep(30);
date_default_timezone_set('Asia/Kolkata');
$nifty_json=file_get_contents('banknifty.json');
$nifty_json=str_replace(' ', '', $nifty_json);
$nifty_json=str_replace("'", "\"", $nifty_json);
$obj=json_decode($nifty_json);
$data=$obj->records->data;
$i=0;
$passedvalue=$obj->records->expiryDates[0];
$pemapping=array();
$cemapping=array();
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
// Read the JSON file 
$json = file_get_contents('banknifty_data.json');
  
// Decode the JSON file
$json_data = json_decode($json,true);
$newDate = date('H:i');  
// Display data
#print_r($json_data);
$time=$json_data['categories'];
$CE=$json_data['CE'];
$PE=$json_data['PE'];
array_push($time,$newDate);
array_push($CE,$cetotal);
array_push($PE,$petotal);
$Full_Data=json_encode(array("categories"=>$time,"CE"=>$CE,"PE"=>$PE));
file_put_contents('banknifty_data.json',$Full_Data);
?>
