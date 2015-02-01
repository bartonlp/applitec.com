<?php
$files = array('DCS-920.jpg', 'DCS-920a.jpg', 'asante_.jpg');
foreach($files as $v) {
  $t = filemtime($v);
  $tt = date("Y-m-d H:i:s", $t);
  echo "File: $v, Time=$tt<br>";
}
?>
