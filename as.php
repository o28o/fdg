<!doctype html>
<html>
<head>
  
<title>Our Funky HTML Page</title>
<meta name="description" content="Our first page">
<meta name="keywords" content="html tutorial template">
</head>
<body>
  <div id="response"></div>
  <script>
  
// Create an XMLHttpRequest object
const xhr = new XMLHttpRequest();

// Select the response element
const responseElement = document.querySelector('#response');

// Define the request URL with the parameter q
const url = 'http://localhost:8080/run.php/?q=adhffffanasamphasso';

// Set up a callback function to handle the response
xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      console.log(xhr.responseText); // The response from the PHP script will be printed to the console
      responseElement.innerHTML = xhr.responseText;


    } else {
      console.error('Error: ' + xhr.status); // Handle errors here
    }
  }
};

// Open the request with the GET method
xhr.open('GET', url, true);

// Send the request
xhr.send();

  
</script>

Content goes here.


      if ( xhr.responseText != "not in") {
     window.location.href="./result/adhivacanasamphasso_suttanta_pali_1-2.html";      
      } else {
        responseElement.innerHTML = xhr.responseText;
      }

</body>
</html>