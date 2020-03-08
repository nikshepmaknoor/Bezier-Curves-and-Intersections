<html>
	<?php 
		session_start();
	?>
	<head>
		<script type="text/javascript">
			function validateForm(){
  				var fields = ["Float1","Float2","Float3","Float4"];
  				var i, l = fields.length;
  				var fieldname;
  				for (i = 0; i < l; i++) {
    				fieldname = fields[i];
    				if (document.forms["input"][fieldname].value === "") {
      					alert(fieldname + " can not be empty");
      					return false;
    				}
  				}
  			return true;
			}
		</script>
	</head>
	<body>
		<form name="input" action="processing.php" method="POST" onsubmit="return validateForm();">
    		Float 1: <input name="Float1" type="text" /><br><br>
    		Float 2: <input name="Float2" type="text" /><br><br>
    		Float 3: <input name="Float3" type="text" /><br><br>
    		Float 4: <input name="Float4" type="text" /><br><br>
    		<input type="submit" name="submit" value="Save Data">
		</form>
		<?php
			$processed=0;
			$processed = $_SESSION['written'];
			if($processed==1){
				$processed=0;
				$_SESSION['written']=0;
				$output = $_SESSION['output'];
				echo "The result is -<br><h2>";
				echo $output;
				echo "</h2><br><br><img src = test.png>";
			}
		?>
	</body>
</html>