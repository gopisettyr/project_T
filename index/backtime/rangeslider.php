<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
<style>
datalist {
  display: flex;
  justify-content: space-between;
  color: red;
  width: 75%;
}

input {
  width: 75%;
}
</style>
<input type="range" list="tickmarks">
<datalist id="tickmarks">
<?php
for($i=0;$i<75;$i++)
	echo "<option value=".($i*10)." label=""></option>";

?>

  <!--<option value="0" label="0"></option>
  <option value="10"></option>
  <option value="20"></option>
  <option value="30"></option>
  <option value="40"></option>
  <option value="50" label="5"></option>
  <option value="60"></option>
  <option value="70"></option>
  <option value="80"></option>
  <option value="90"></option>
  <option value="100" label="10"></option>-->
</datalist>