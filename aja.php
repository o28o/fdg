
<?php
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');
include 'scripts/opentexts.php';
?>
<?php 
if(isset($_GET['q']) && isset($_GET['p'])){ 
	$email = $_GET['q']; 
	$password = $_GET['p']; 
 
	//further action will go here... 

include 'scripts/multilang-search.php';
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>Let's talk with server without refreshing page</title> 
	
	<!--  Core theme CSS (includes Bootstrap)-->
<link href="/assets/css/jquery-ui.css" rel="stylesheet"/>
<link href="/assets/css/styles.css" rel="stylesheet" />
<link href="/assets/css/extrastyles.css" rel="stylesheet" />

<script src="/assets/js/jquery-3.6.0.js"></script>
<script src="/assets/js/jquery-ui.js"></script>
</head> 
<body> 
	<form method="get"> 
		<input type="email" name="email" placeholder="Email"><br/> 
		<input type="password" name="pass" placeholder="Password"><br/> 
		<button type="button" id="submit">Submit</button> 
		
		            <div id="spinner" class="justify-content-center mt-8">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              </div>
              
	</form> 
	
	
			<div class="input-group-append"><button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" id="searchbtn" class="btn btn-primary mainbutton ms-1 me-1 rounded-pill "><i class="fas fa-search fa-flip-horizontal"></i></button></div>
		</div>
		
   <div id="response"></div>

<script type="text/javascript"> 
$(document).ready(function(){ 
  $('#submit').on('click', function(){ 
document.getElementById( 'spinner' ).style.display = 'block';
	//first get the value of input fields.. 
	var email = $('input[name="email"]').val(), 
	    pass = $('input[name="pass"]').val(); 
    //alert(email+pass); 
 
    //now use ajax to send the data from client system to server... 
    $.ajax({ 
	type: 'get', //specify the type of request GET Or POST  
	url: '', // specify the url where u gonna write php code to handle this ajax request or leave empty if same page... 
	data: {q : email, p : pass}, 
	success: function(data){ 
            console.log(data); 
		//alert('Data successfully sent...email :'+email+', Password: '+pass); 
		document.getElementById( 'spinner' ).style.display = 'none';
		const responseElement = document.querySelector('#response');
		
  responseElement.innerHTML = data;
  window.location.href="./result/adhivacanasamphasso_suttanta_pali_1-2.html";
	}, 
	error: function(data){ 
		console.log(data); 
		alert('something went wrong...'); 
	} 
 
    }); 
 
  }); 
}); 
</script> 

</body> 
        <script type="text/javascript" src="/assets/js/bootstrap.bundle.5.13.min.js"></script> 
</html> 