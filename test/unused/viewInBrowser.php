<?php
  
// Store the file name into variable
$file = '/assets/materials/pali_cases_rus.pdf';
$filename = 'pali_cases_rus.pdf';
  
// Header content type
header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $filename . '"');
  
header('Content-Transfer-Encoding: binary');
  
header('Accept-Ranges: bytes');
  
// Read the file
@readfile($file);
  
?>