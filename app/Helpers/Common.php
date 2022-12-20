<?php 

function showDate($carbon, $format = "j M Y"){

  return $carbon->translatedFormat($format);
  
}

?>