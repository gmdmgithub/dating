<span>&copy; Copyright <span id="YEAR"><?php echo date('Y');?></span> by Dominik Mika</span>
<img src="./img/facebook-3.svg" title="Dołącz do nas" style="width:20px;cursor:pointer;margin-bottom:-4px;margin-left:15px;">
<img src="./img/facebook-like.svg" title="I like it :)" style="width:20px;cursor:pointer;margin-bottom:-4px;margin-left:5px;">
 <script>
function getYear(){
	var year = (new Date()).getYear() +1900;
	document.getElementById('YEAR').innerHTML = year;
}
//getYear(); //zmienilem na php
</script>
<?php
	if($conn)
		$conn->close();
?>