<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="refresh" content="60">
	<title>Intraday OI</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="card text-center">
<div class="card-body">
<div class="row">
<div class="col-md-4"> 
<?php
include 'nifty_bar.php';
?>
</div>
<div class="col-md-3"> 
<?php
include 'nifty_column.php';
include 'banknifty-column.php';
?>
</div>
<div class="col-md-5">
<?php
include 'banknifty_bar.php';
?>
</div>
</div>
<div>

</div>
</div>
</div>
</body>	
</html>      
