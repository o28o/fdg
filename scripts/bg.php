<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BG Find the Dhamma</title>
<link rel="icon" type="image/png" href="https://dhamma.gift/assets/img/favico-fdg.png" />
 

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

#cover {
    background: #222 url('https://unsplash.it/920/1080/?blur=3') center center no-repeat;
	/*opacity: 0.6;*/
    background-size: cover;
    text-align: center;
    display: flex;
    align-items: center;
    position: relative;
}

#cover-caption {
    width: 100%;
	height: 100%;
    position: relative;
    z-index: 1;
}

/* only used for background overlay not needed for centering */
form:before {
	
    content: '';
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    background-color: rgba(0,0,0,0.3);
    z-index: -1;
    border-radius: 10px;
}
@media only screen and (max-width: 1000px) {
  body {
	  	height: 20%;

	width: 100%;
	zoom: 120%;
  }
  
#cover {
    background: #222  url('https://unsplash.it/900/1080/') center center no-repeat; 
	/*opacity: 0.6;*/
    background-size: cover;
    text-align: center;
    display: flex;
    align-items: center;
    position: relative;
	height: 20%;
}
#cover-caption {
    width: 100%;
	height: -20%;
    position: absolute;
    z-index: 1;
}
.center {
  display: none;
}
}
</style>
</head>

	<?php
		// Defining variables
		$pattern = "";

		// Checking for a POST request
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pattern = test_input($_POST["pattern"]);
/* 		$pitaka = test_input($_POST["pitaka"]);
 */		}

		// Removing the redundant HTML characters if any exist.
		function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
		?>

		<!--<form method="post" action=
			/* "<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>"> */
			
			<input type="text" name="pattern">
			<br>
			<input type="radio" name="pitaka"
				value="Sutta">Sutta
			<input type="radio" name="pitaka"
				value="Vinaya">Vinaya
			<input type="radio" name="pitaka"
				value="Abhidhamma">Abhidhamma
			<br> 
			<input type="submit" name="submit"
				value="Search">
		</form>
-->
		
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
				<img src="./assets/dhammafindlogo.png" alt="Dhammafind" class="center">

                    <h2 class=" py-3 text-truncate">Background mode</h2>
                    <p>In case of timeout in normal mode</br></p>
                    <div class="px-4">
                        
						<form method="post" action=
			"<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" 						action="" class="justify-content-center">  

                            <div class="form-group">
                                <label class="sr-only">Pattern</label>
                                <input name="pattern"  type="text" class="form-control" placeholder="e.g. Kāyagat">
                            </div>

                            <button type="submit" name="submit"
				value="Search" style="background-color:#912a07; border-color:#912a07;"class="btn btn-primary btn-lg">Search in bg</button>
                        </form>
                    </div>
					</br>
			    				<?php
/*			echo "<h2>Your Input:</h2>";
			echo $pattern;
 			echo "<br>";
			echo $pitaka; */
			
			
			$fp = fopen('./input/input.txt', 'a');
fwrite($fp, $pattern);
fwrite($fp, "\n");
fclose($fp);
echo "<p>Wait for 20-30 minutes and check results below</p>";

	/*		$old_path = getcwd();
			$output = shell_exec("nohup ./scripts/finddhamma.sh $pattern &" ); 
			echo "<p>$output</p>";
			*/
		?>
		<p><a href='./list.php'>All Searches</a></p>
                </div>
            </div>
        </div>
	</div>
</section>
<a href="/">Normal Mode</a>
<a href="https://github.com/o28o/fdg">GitHub</a>
</body>
</html>

