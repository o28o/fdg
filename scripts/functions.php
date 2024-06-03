<?php 

function RandomPlaceholder($lang) {
  if ($lang == "ru") {
  $words = Array("Kāyagat","Seyyathāpi","Samudd","Cūḷanik", "Suññat", "Mūsik", "Hatthī", "Слон", "дрессировщик", "satipaṭṭhānā");
  $suttas = Array("Sn56.11","Dn22","Сн12.2", "an4.163");
  $or = " или ";
  } else {
   $words = Array("Kāyagat","Seyyathāpi","Samudd","Cūḷanik", "elephant", "ocean", "satipaṭṭhānā");
  $suttas = Array("Sn56.11","Dn22","Sn12.2", "An4.163"); 
  $or = " or ";
  }
echo $words[array_rand($words)]. $or .  $suttas[array_rand($suttas)]; 
}

//<?php RandomPlaceholder("ru") ?>
?> 
