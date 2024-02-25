<?php
if(isset($_GET['checkboxes'])){
    $selected_values = array_map('strtolower', $_GET['checkboxes']);
    $selected_values_string = implode(',', $selected_values);
    $new_url = 'http://127.0.0.1:8080/d.php?d=' . $selected_values_string;
    header('Location: ' . $new_url);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Обработка чекбоксов</title>
</head>
<body>

<form id="checkboxForm">
    <input type="checkbox" name="checkboxes[]" value="an"> AN<br>
    <input type="checkbox" name="checkboxes[]" value="sn"> SN<br>
    <input type="checkbox" name="checkboxes[]" value="mn"> MN<br>    
    <input type="checkbox" name="checkboxes[]" value="dn"> DN<br>
    <input type="checkbox" name="checkboxes[]" value="kn"> KN<br>
    <input type="checkbox" name="checkboxes[]" value="lt"> Later KN<br>
    <input type="checkbox" name="checkboxes[]" value="vn"> Vinaya<br>    
    <input type="checkbox" name="checkboxes[]" value="kp"> Later Vinaya<br>
    
    <input type="submit" value="Submit">
</form>

</body>
</html>