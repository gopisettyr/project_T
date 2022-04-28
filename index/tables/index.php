<meta http-equiv="refresh" content="30">
<title>Tables</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
<script>
$(document).ready(function(){
	$("#Hourly_Gainers").DataTable();
	$("#Fall_from_intraday_high").DataTable();
	$("#Recovery_from_intraday_low").DataTable();
	$("#Price_shockers").DataTable();	
	$("#volume_shockers").DataTable();
})
</script>
<style>
table > thead > tr > th {
  font-size: 10px;
}
table > tbody > tr > td {
  font-size: 10px;
}
</style>
<div class="card text-center">
<div class="card-body">
<div class="row">
<div class="col-md-6"> 
<?php

include 'hourly_gainers_table.php';
?>
</div>
<div class="col-md-6"> 
<?php
include 'Fall_from_intraday_high_table.php';
?>
</div>
</div>
<div class="row">
<div class="col-md-6"> 
<?php

include 'Recovery_from_intraday_low_table.php';
?>
</div>
<div class="col-md-6"> 
<?php
include 'Price_shockers_table.php';
?>
</div>
</div>
<div class="row">
<div class="col-md-6"> 
<?php
include 'volume_shockers_table.php';
?>
</div>
</div>
</div>
</div>
